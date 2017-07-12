<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
      'name','email','password','sindico','type','phone',
    ];
    protected $guarded =[];
}
