<?php 

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Repository;

class UserRepository extends Repository {

    public function model() 
    {
        return 'App\Models\User';
    }
}