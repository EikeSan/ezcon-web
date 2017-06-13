<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index(){
      $title = " - Home";
      $var1 = 123;
      $arrayData = [1,2,3,4,5,6,7,8,9];
      return view('Site.home.index', compact('title', 'var1','arrayData'));
    }
    public function contato(){
      return view('Site.contato.index');
    }
    public function categoria($id=null){
      return view('welcome');
    }
    public function categoriaOp($id=1){
      return "Pagina com {$id}";
    }
}
