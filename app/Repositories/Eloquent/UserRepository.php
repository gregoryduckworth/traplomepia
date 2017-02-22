<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\UserInterface;
use App\Repositories\Eloquent\Repository;
use App\Repositories\Traits\CacheableRepository;

class UserRepository extends Repository implements UserInterface
{
    use CacheableRepository;

    public function model()
    {
        return 'App\Models\User';
    }
}
