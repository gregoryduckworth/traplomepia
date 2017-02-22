<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\PermissionInterface;
use App\Repositories\Eloquent\Repository;

class PermissionRepository extends Repository implements PermissionInterface
{
    public function model()
    {
        return 'App\Models\Permission';
    }
}
