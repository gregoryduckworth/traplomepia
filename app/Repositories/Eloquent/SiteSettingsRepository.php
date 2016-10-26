<?php 

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\SiteSettingsInterface;

class SiteSettingsRepository extends Repository implements SiteSettingsInterface{

    public function model() 
    {
        return 'App\Models\SiteSettings';
    }
}