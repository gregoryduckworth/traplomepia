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
            'key' => 'full_name',
            'value' => 'AdminSite'
        ]);

        SiteSettings::create([
            'key' => 'short_name',
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

        SiteSettings::create([
            'key' => 'picture',
            'value' => 'https://placeholdit.imgix.net/~text?txtsize=33&txt=Admin&w=100&h=100'
        ]);
    }
}
