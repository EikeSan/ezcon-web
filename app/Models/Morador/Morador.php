<?php

namespace App\Models\Morador;

use Illuminate\Database\Eloquent\Model;

class Morador extends Model
{
  protected $fillable = [
    'id_apartamentos','id_users'
  ];

  protected $guarded =[];
  
}
