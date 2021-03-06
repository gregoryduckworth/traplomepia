<?php

namespace App\Repositories\Contracts;

/**
 * Interface RepositoryInterface
 */
interface RepositoryInterface
{

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = ['*']);

    /**
     * @return int
     */
    public function count();

    /**
     * @param $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 1, $columns = ['*']);

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @return mixed
     */
    public function deleted();

    /**
     * @param  $id
     * @return Boolean
     */
    public function restore($id);

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = ['*']);

    /**
     * @param $field
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($field, $value, $columns = ['*']);

    /**
     * @param $attribute
     * @param $operator
     * @param $value
     * @return mixed
     */
    public function where($attribute, $operator, $value);

    /**
     * @return mixed
     */
    public function nest();

    /**
     * @param $nest
     */
    public function addRelation($nest);

    /**
     * @param  $id
     * @return mixed
     */
    public function selectChild($id);
}
