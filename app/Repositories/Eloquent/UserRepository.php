<?php 

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\UserInterface;
use App\Repositories\Traits\CacheableRepository;

class UserRepository extends Repository implements UserInterface
{
	use CacheableRepository;

	// Set the lifetime of the cache 
	protected $cacheMinutes = 90;

    public function model()
    {
        return 'App\Models\User';
    }
}
