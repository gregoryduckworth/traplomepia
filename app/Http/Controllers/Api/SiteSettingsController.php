<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\SiteSettingsInterface as SiteSettings;
use App\Http\Requests\SiteSettingsFormRequest;
use App\Http\Requests\ImageFormRequest;
use Illuminate\Support\Facades\File;

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

    /**
     * Update the logo for the entire site
     * 
     * @param  ImageFormRequest $request 
     * @return Response
     */
    public function updatePicture(ImageFormRequest $request)
    {
        // Get the image from the form
        if($image = $request->image){
            $setting = $this->site_settings->where('key', '=', 'picture')->first();
            // Delete the previous picture
            File::delete(public_path() . $setting->value);

            // Create the new image under the /site/ folder 
            $fileName = str_random(20) . '.'. $image->extension();
            $image->move(public_path('/site/img/'), $fileName);
            $setting->where('key', '=', 'picture')->update([ 'value' => '/site/img/'.$fileName]);
            return response()->json(['msg' => trans('json.site_image_updated', ['type' => trans('site.site')]), 'status' => 'success']);
        }
        return response()->json(['msg' => trans('json.something_went_wrong'), 'status' => 'error']);
    }
}
