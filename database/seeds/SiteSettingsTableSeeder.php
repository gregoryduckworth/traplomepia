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
            'key' => 'registration',
            'value' => 'on'
        ]);

        SiteSettings::create([
            'key' => 'colour_scheme',
            'value' => 'blue'
        ]);
    }
}
