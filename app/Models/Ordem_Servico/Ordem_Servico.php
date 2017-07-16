<?php

namespace App\Models\Ordem_Servico;

use Illuminate\Database\Eloquent\Model;

class Ordem_Servico extends Model
{
  protected $fillable = [
    'id_moradors','id_apartamentos','id_funcionarios','descricao','status','solucao','custo'
  ];

  protected $guarded =[];
}
