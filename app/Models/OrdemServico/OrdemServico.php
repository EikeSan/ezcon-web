<?php

namespace App\Models\OrdemServico;

use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
  protected $fillable = [
    'id_moradors','id_apartamentos','id_funcionarios','descricao','status','solucao','custo'
  ];

  protected $guarded =[];
}
