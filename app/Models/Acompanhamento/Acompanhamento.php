<?php

namespace App\Models\Acompanhamento;

use Illuminate\Database\Eloquent\Model;

class Acompanhamento extends Model
{
  protected $fillable = [
    'id_ordem_servicos','acompanhamento'
  ];

  protected $guarded =[];
}
