<?php 

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Repository;
use App\Repositories\RoleInterface;

class RoleRepository extends Repository implements RoleInterface{

    public function model() 
    {
        return 'App\Models\Role';
    }
}