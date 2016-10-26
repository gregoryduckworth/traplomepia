<?php 

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Repository;

class SiteSettingsRepository extends Repository {

    public function model() 
    {
        return 'App\Models\SiteSettings';
    }
}