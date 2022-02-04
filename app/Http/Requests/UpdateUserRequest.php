<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => 'required|unique:users,email,'. \Request::segment(3),
            'name' => 'required|unique:users,name,'.\Request::segment(3),
            'role' => 'required',
            'password' => 'confirmed|min:8',
        ];
    }
}
