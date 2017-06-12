<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index(){
      return view('welcome');
    }
    public function contato(){
      return view('contato');
    }
    public function categoria($id){
      return "Pagina com {$id}";
    }
    public function categoriaOp($id=1){
      return "Pagina com {$id}";
    }
}
