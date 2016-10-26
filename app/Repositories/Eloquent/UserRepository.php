<?php 

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\UserInterface;

class UserRepository extends Repository implements UserInterface {

    public function model() 
    {
        return 'App\Models\User';
    }

    
}