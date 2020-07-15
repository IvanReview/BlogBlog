<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\Routing\Route;

class UserUpdateRequest extends FormRequest
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
            'name'         =>    'required|string|min:3|max:200',
            'email'        =>    'required|max:200|email|string|unique:users,email,'. $this->route()->parameter('user')->id,
            'password'     =>    'nullable|string|min:6|confirmed',
        ];
    }


    public function messages()
    {
        return [
            'required'=>'Введите :attribute пользователя',
            'title.min'=>' :attribute должен содержать минимум  :min символов',
        ];
    }

    public function attributes()
    {
        return [
            'name'=>'имя',
            'email'=>'эмаил',
            'password'=>'пароль'
        ];
    }
}
