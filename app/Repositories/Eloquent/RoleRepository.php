<?php 

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Repository;

class RoleRepository extends Repository {

    public function model() 
    {
        return 'App\Models\Role';
    }
}