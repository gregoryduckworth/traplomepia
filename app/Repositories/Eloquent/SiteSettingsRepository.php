<?php 

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Repository;
use App\Repositories\SiteSettingsInterface;

class SiteSettingsRepository extends Repository implements SiteSettingsInterface{

    public function model() 
    {
        return 'App\Models\SiteSettings';
    }
}