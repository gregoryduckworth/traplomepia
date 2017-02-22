<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\SiteSettingsInterface;
use App\Repositories\Eloquent\Repository;

class SiteSettingsRepository extends Repository implements SiteSettingsInterface
{
    public function model()
    {
        return 'App\Models\SiteSettings';
    }
}
