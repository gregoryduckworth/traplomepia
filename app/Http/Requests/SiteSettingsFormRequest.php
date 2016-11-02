<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SiteSettingsFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => 'required|max:16',
            'short_name' => 'required|max:6',
            'registration' => 'required|in:open,closed',
            'colour_scheme' => 'required',
        ];
    }
}
