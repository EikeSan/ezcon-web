<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdemServicoFormRequest extends FormRequest
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
            'solicitante' => 'required',
            'id_apartamentos' => 'required|numeric',
            'descricao' => 'required|max:50',
            'custo' => 'between:0,99.99',
            'solucao' => 'max:50',
        ];
    }
}
