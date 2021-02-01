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
            'image' => 'image',
            'email' => 'unique:users,email,'.$this->segment(3).',id',
            'phone' => 'min:10|unique:users,phone,'.$this->segment(3).',id'
        ];
    }

    public function messages()
    {
        return [
            'image.image' => 'This is not image',
            'email.unique' => 'This email already exists',
            'phone.unique' => 'This phone already exists',
            'phone.min' => 'Phone number must not be less than 10 characters'
        ];
    }
}
