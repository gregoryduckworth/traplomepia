<?php 

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\PermissionInterface;

class PermissionRepository extends Repository implements PermissionInterface {

    public function model() 
    {
        return 'App\Models\Permission';
    }
}