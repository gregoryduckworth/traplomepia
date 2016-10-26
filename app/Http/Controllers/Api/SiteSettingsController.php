<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\SiteSettingsInterface as SiteSettings;
use App\Http\Requests\SiteSettingsFormRequest;

class SiteSettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SiteSettings $site_settings)
    {
        $this->site_settings = $site_settings;
    }

    /**
     * Update the site settings in the system
     *
     * @param  SiteSettingsFormRequest $request
     * @return Response
     */
    public function update(SiteSettingsFormRequest $request)
    {
        // Run through each of the settings that we want to update
        // and if any fail then return an error
        foreach($request->except('_token') as $key => $value){
            $setting = $this->site_settings->where('key', '=', $key)->first();
            if(!$setting->update(['value' => $value])){
                return response()->json(['msg' => trans('json.something_went_wrong'), 'status' => 'error']);
            }
        }
        return response()->json(['msg' => trans('json.site_settings_updated'), 'status' => 'success']);   
    }
}
