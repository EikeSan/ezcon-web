<?php

namespace App\Http\Controllers\Acompanhamento;

//Imports de Requests
use Illuminate\Http\Request;
use App\Http\Requests\OrdemServicoFormRequest;

//Import Modelo do Controller
use App\Http\Controllers\Controller;

//Imports dos Models
use App\User;
use App\Models\Funcionario\Funcionario;
use App\Models\OrdemServico\OrdemServico;
use App\Models\Morador\Morador;
use App\Models\Apartamento\Apartamento;
use App\Models\Acompanhamento\Acompanhamento;


class AcompanhamentoController extends Controller
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
     private $acompanhamento;

     public function __construct(Acompanhamento $acompanhamento,User $user, Funcionario $funcionario, OrdemServico $ordemServico, Apartamento $apartamento, Morador $morador)
     {
         $this->funcionario = $funcionario;
         $this->user = $user;
         $this->morador = $morador;
         $this->ordemServico = $ordemServico;
         $this->apartamento = $apartamento;
         $this->acompanhamento = $acompanhamento;
         $this->middleware('auth');
     }

    public function index()
    {
        //return view('Acompanhamento.index');
        return redirect()->route('home.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function lista($id)
    {
      $title = " - Acompanhamento";
      $acompanhamentos = $this->acompanhamento->where('id_ordem_servicos', $id)->get();
      return view('Acompanhamento.lista',compact('title','acompanhamentos'));

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
