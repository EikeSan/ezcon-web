<?php

namespace App\Http\Controllers\Funcionario;

//Imports de Requests
use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\FuncionarioFormRequest;

//Import Modelo do Controller
use App\Http\Controllers\Controller;

//Imports dos Models
use App\User;
use App\Models\Funcionario\Funcionario;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     private $funcionario;
     private $user;

     public function __construct(User $user, Funcionario $funcionario)
     {
         $this->funcionario = $funcionario;
         $this->user = $user;
         $this->middleware('auth');
     }

    public function index()
    {
        return view('Funcionario.index');
    }

    public function lista()
    {
      $funcionarios = $this->funcionario->all();
      $users = $this->user->all();
      $title = " - Lista de Funcionários";
      return view('Funcionario.lista',compact('funcionarios','users','title'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = " - Cadastro Funcionário";
        return view('Funcionario.create-edit',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
      $dataForm = $request->all();
      $dataForm['sindico'] = (!isset($dataForm['sindico'])) ? 0 : 1;

      $insert = $this->user->create([
        'name' => $dataForm['name'],
        'email' => $dataForm['email'],
        'password' => bcrypt($dataForm['password']),
        'type' => $dataForm['type'],
        'sindico' => $dataForm['sindico'],
        'phone' => $dataForm['phone'],
      ]);

      if ($insert) {
        return view('Funcionario.create-edit-2',compact('insert'));
      }else {
        return view('Funcionario.create-edit');
      }
    }


    public function store2(FuncionarioFormRequest $request)
    {
      $dataForm = $request->all();
      $insert = $this->funcionario->create($dataForm);
      if ($insert) {
        return redirect()->route('funcionario.lista');
      }else {
        return view('Funcionario.create-edit-2');
      }
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
