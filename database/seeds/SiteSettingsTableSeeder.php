<?php

use App\Models\SiteSettings;
use Illuminate\Database\Seeder;

class SiteSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteSettings::create([
            'key' => 'site_full_name',
            'value' => 'AdminSite'
        ]);

        SiteSettings::create([
            'key' => 'site_short_name',
            'value' => 'ASite'
        ]);

        SiteSettings::create([
            'key' => 'registration',
            'value' => 'open'
        ]);

        SiteSettings::create([
            'key' => 'colour_scheme',
            'value' => 'blue'
        ]);
    }
}
