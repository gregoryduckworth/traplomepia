<?php 

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\RoleInterface;
use App\Repositories\Traits\CacheableRepository;

class RoleRepository extends Repository implements RoleInterface
{
	use CacheableRepository;

    public function model()
    {
        return 'App\Models\Role';
    }
}
