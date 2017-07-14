<?php

namespace App\Models\Funcionario;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
  protected $fillable = [
    'funcao','data_admissao','data_demissao','id_users'
  ];

  protected $guarded =[];
}
