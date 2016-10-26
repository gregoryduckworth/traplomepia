<?php 

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Repository;
use App\Repositories\UserInterface;

class UserRepository extends Repository implements UserInterface {

    public function model() 
    {
        return 'App\Models\User';
    }

    
}