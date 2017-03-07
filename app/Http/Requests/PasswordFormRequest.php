<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PasswordFormRequest extends Request
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
            'old_password' => 'required|min:6|max:255',
            'password' => 'required|confirmed|min:6|max:255|different:old_password',
            'password_confirmation' => 'required_with:password|min:6|max:255',
        ];
    }
}
