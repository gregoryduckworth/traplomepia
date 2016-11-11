<?php 

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\RepositoryInterface;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\Events\RepositoryEntityCreated;
use App\Repositories\Events\RepositoryEntityDeleted;
use App\Repositories\Events\RepositoryEntityUpdated;

/**
 * Class Repository
 */

abstract class Repository implements RepositoryInterface
{

    /**
     * @var
     */
    protected $model;

    /**
     * @param Collection $collection
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract public function model();

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = ['*'])
    {
        return $this->model->get($columns);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->model->all());
    }

    /**
     * @param array $relations
     * @return $this
     */
    public function with(array $relations)
    {
        $this->model = $this->model->with($relations);
        return $this->model;
    }

    /**
     * @param array $relations
     * @return $this
     */
    public function whereHas($relation, $query)
    {
        $this->model = $this->model->whereHas($relation, $query);
        return $this->model;
    }

    /**
     * @param  string $value
     * @param  string $key
     * @return array
     */
    public function lists($value, $key = null)
    {
        $lists = $this->model->pluck($value, $key);
        if (is_array($lists)) {
            return $lists;
        }
        return $lists->all();
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 25, $columns = ['*'])
    {
        return $this->model->paginate($perPage, $columns);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $model = $this->model->create($data);
        event(new RepositoryEntityCreated($this, $model));
        return $model;
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute = "id")
    {
        event(new RepositoryEntityUpdated($this, $this->model->find($id)));
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $model = $this->model->find($id);
        event(new RepositoryEntityDeleted($this, $model));
        return $model->destroy($id);
    }

    /**
     * @return array
     */
    public function deleted()
    {
        return $this->model->onlyTrashed();
    }

    /**
     * @param  $id
     * @return Boolean
     */
    public function restore($id)
    {
        return $this->model->onlyTrashed()->find($id)->restore();
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = ['*'])
    {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    /**
     * @param  $attribute
     * @param  $operator
     * @param  $value
     * @return mixed
     */
    public function where($attribute, $operator, $value)
    {
        return $this->model->where($attribute, $operator, $value)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     * @throws RepositoryException
     */
    public function makeModel()
    {
        return $this->setModel($this->model());
    }

    /**
     * Set Eloquent Model to instantiate
     *
     * @param $eloquentModel
     * @return Model
     * @throws RepositoryException
     */
    public function setModel($eloquentModel)
    {
        $this->model = $this->app->make($eloquentModel);
        if (!$this->model instanceof Model) {
            throw new RepositoryException("Class {$this->model} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        return $this->model;
    }

    /**
     * Order the collection by a certain column
     * and set the sorting order
     *
     * @param  $column
     * @param  $sorting
     * @return mixed
     */
    public function orderBy($column, $sorting = 'ASC')
    {
        return $this->model->orderBy($column, $sorting)->get();
    }

    /**
     * Fetch the nested structure from the database
     *
     * @return mixed
     */
    public function nest()
    {
        $nest = $this->model->orderBy('parent_id')->where('parent_id', null)->get();
        $nest = $this->addRelation($nest);
        return $nest;
    }

    /**
     * Create the relation between the parent and the child
     *
     * @param $nest
     */
    public function addRelation($nest)
    {
        $nest->map(function ($item, $key) {
            $sub = $this->selectChild($item->id);
            return $item = array_add($item, 'children', $sub);
        });
        return $nest;
    }

    /**
     * Select the children from the database
     * and recursively add the iteration
     *
     * @param  $id
     * @return mixed
     */
    public function selectChild($id)
    {
        $nest = $this->model->where('parent_id', $id)->get();
        $nest = $this->addRelation($nest);
        return $nest;
    }
}
