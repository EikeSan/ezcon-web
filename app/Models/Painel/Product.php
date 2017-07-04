<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'name','number','active','category','description'
    ];
    protected $guarded =[];

    public $rules = [
      'name'  => 'required|min:3|max:100',
      'number'  => 'required',
      'category'  => 'required',
      'description' => 'min:3|max:1000'
    ];

    public $messages = [
      'name.required' => 'Campo nome é obrigátorio!',
      'name.min' => 'Campo nome tem que conter pelo menos 3 caracteres!',
      'name.max' => 'Campo nome não pode conter mais que 100 caracteres!',
      'number.required' => 'Campo número é obrigátorio!',
      'category.required' => 'Campo categoria é obrigátorio!',
      'description.min' => 'Campo descrição tem que conter pelo menos 3 caracteres!',
      'description.max' => 'Campo descrição não pode conter mais que 1000 caracteres!'
    ];
}
