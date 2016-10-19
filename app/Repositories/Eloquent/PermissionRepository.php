<?php 

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Repository;

class PermissionRepository extends Repository {

    public function model() 
    {
        return 'App\Models\Permission';
    }
}