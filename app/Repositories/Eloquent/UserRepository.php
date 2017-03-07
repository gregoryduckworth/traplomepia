<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\UserInterface;
use App\Repositories\Eloquent\Repository;

class UserRepository extends Repository implements UserInterface
{
    public function model()
    {
        return 'App\Models\User';
    }
}
