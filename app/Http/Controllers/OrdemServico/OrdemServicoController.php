<?php

namespace App\Http\Controllers\OrdemServico;

//Imports de Requests
use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\FuncionarioFormRequest;

//Import Modelo do Controller
use App\Http\Controllers\Controller;

//Imports dos Models
use App\User;
use App\Models\Funcionario\Funcionario;
use App\Models\Ordem_Servico\Ordem_Servico;
use App\Models\Morador\Morador;
use App\Models\Apartamento\Apartamento;


class OrdemServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $funcionario;
     private $user;
     private $apartamento;
     private $morador;
     private $ordemServico;

     public function __construct(User $user, Funcionario $funcionario, Ordem_Servico $ordemServico, Apartamento $apartamento, Morador $morador)
     {
         $this->funcionario = $funcionario;
         $this->user = $user;
         $this->morador = $morador;
         $this->ordemServico = $ordemServico;
         $this->apartamento = $apartamento;
         $this->middleware('auth');
     }


    public function index()
    {
        return view('OrdemDeServico.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function lista($id)
     {
       $user = $this->user->find($id);

       if ($user->type == 'funcionario') {
         return view('OrdemDeServico.funcionario-lista');
       }else if ($user->type == 'morador' && $user->sindico == 1) {
         return view('OrdemDeServico.sindico-lista');
       }else if ($user->type == 'morador') {
         return view('OrdemDeServico.morador-lista');
       }else{
         return view('OrdemDeServico.index');
       }


     }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
