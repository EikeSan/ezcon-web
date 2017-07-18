<?php

namespace App\Http\Controllers\Morador;

//Imports de Requests
use App\Http\Requests\MoradorFormRequest;
use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;

//Imports do Controller
use App\Http\Controllers\Controller;

//Imports de Models
use App\User;
use App\Models\Morador\Morador;
use App\Models\Apartamento\Apartamento;


class MoradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     private $apartamento;
     private $morador;
     private $user;

     public function __construct(Morador $morador, User $user, Apartamento $apartamento)
     {
         $this->apartamento = $apartamento;
         $this->morador = $morador;
         $this->user = $user;
         $this->middleware('auth');
     }


    public function index()
    {
        $title = ' - Moradores';
        $moradores = $this->morador->all();
        $users = $this->user->all();
        return view('Morador.index',compact('title','moradores','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = ' - Cadastro Morador';
        $types = ['admin','morador'];
        return view('Morador.create-edit',compact('title','types'));
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
        $apartamentos = $this->apartamento->all();
        return view('Morador.create-edit-2',compact('insert','apartamentos'));
      }else {
        return view('Morador.create-edit');
      }
    }

    public function store2(MoradorFormRequest $request)
    {
      $dataForm = $request->all();
      $insert = $this->morador->create($dataForm);
      if ($insert) {
        return redirect()->route('home.index');
      }else {
        return view('Morador.create-edit-2')->withErrors("Erro ao criar morador");
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
      $user = $this->user->find($id);
      $moradores = $this->morador->where('id_users', $id)->get()->all();
      foreach ($moradores as $morador) {
        $apartamento = $this->apartamento->find($morador->id_apartamentos);
      }
      $title = " - Visualizar";
      return view('Morador.show',compact('user','title','apartamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = $this->user->find($id);
      $title = " - Editar : $user->name";
      $types = ['morador','funcionario'];
      return view('Morador.create-edit',compact('title','types','user'));
    }

    public function edit2($id)
    {
      $apartamentos = $this->apartamento->all();
      $user = $this->user->find($id);
      $moradores = $this->morador->where('id_users', "$id")->get()->all();

      $title = " - Editar : $user->name";
      $types = ['morador','funcionario'];
      return view('Morador.create-edit-2',compact('title','apartamentos','user','moradores'));
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
      $dataForm = $request->all();
      $user = $this->user->find($id);

      $update = $user->update($dataForm);
      if ($update) {
        $apartamentos = $this->apartamento->all();
        return redirect()->route('morador.edit2',compact('id','apartamentos'));
      }else {
        return redirect()->route('morador.edit',$id)->withErrors('Falha ao Editar');
      }
    }

    public function update2(Request $request, $id)
    {
      $dataForm = $request->all();
      $morador = $this->morador->find($id);

      $dataForm['sindico'] = (!isset($dataForm['sindico'])) ? 0 : 1;

      $update = $morador->update($dataForm);
      if ($update) {
        return redirect()->route('home.index');
      }else {
        return redirect()->route('morador.edit2',$morador->id_users)->withErrors('Falha ao Editar');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = $this->user->find($id);
      $delete = $user->delete();
      if ($delete) {
        return redirect()->route('home.index');
      }else {
        return redirect()->route('morador.show',$id)->withErrors('Falha ao Deletar');
      }
    }
}
