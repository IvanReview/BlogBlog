<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesCreateRequest extends FormRequest
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
            'title'       =>    'required|min:5|max:200',
            'slug'        =>    'max:200',
            'description' =>    'required|string|min:5|max:10000',
            'categories'  =>    'required'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'Укажите :attribute статьи',
            'title.min'=>'Минимальное число символов в поле :attribute :min',
            'description.min'=>'Минимальная длинна символов в поле :attribute :min',

        ];
    }

    //перевод атрибутов
    public function attributes()
    {
        return [
            'title'=>'Заголовок',
            'description'=>'Описание',
            'categories' => 'Категорию'
        ];
    }
}
