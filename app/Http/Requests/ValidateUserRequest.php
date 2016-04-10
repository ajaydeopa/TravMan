<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ValidateUserRequest extends Request
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
            'user_name' => 'required|min:6',
            'mail' => 'required|email',
            'password' => 'required',
            'cpassword' => 'required',
        ];
    }
}
