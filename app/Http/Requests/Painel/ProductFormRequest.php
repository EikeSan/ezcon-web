<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
          'name'  => 'required|min:3|max:100',
          'number'  => 'required',
          'category'  => 'required',
          'description' => 'nullable|min:3|max:1000'
        ];
    }

    // public function messages ()
    // {
    //   return [
    //     'name.required' => 'Campo nome é obrigátorio!',
    //     'name.min' => 'Campo nome tem que conter pelo menos 3 caracteres!',
    //     'name.max' => 'Campo nome não pode conter mais que 100 caracteres!',
    //     'number.required' => 'Campo número é obrigátorio!',
    //     'category.required' => 'Campo categoria é obrigátorio!',
    //     'description.min' => 'Campo descrição tem que conter pelo menos 3 caracteres!',
    //     'description.max' => 'Campo descrição não pode conter mais que 1000 caracteres!'
    //   ];
    // }
}
