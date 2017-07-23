<?php

namespace App\Http\Controllers\OrdemServico;

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

     public function __construct(User $user, Funcionario $funcionario, OrdemServico $ordemServico, Apartamento $apartamento, Morador $morador)
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
       $apartamentos = $this->apartamento->all();
       $moradores = $this->morador->all();
       $users = $this->user->all();
       $title = " - Minhas OS";

       if ($user->type == 'funcionario') {

         $funcionarios = $this->funcionario->where('id_users', $id )->get();

         foreach ($funcionarios as $funcionario) {
           $ordemServicos = $this->ordemServico->where('id_funcionarios', $funcionario->id)->get();

         }
         return view('OrdemDeServico.funcionario-lista',compact('title','apartamentos','users','moradores','funcionario','ordemServicos'));

       }else if ($user->type == 'morador' && $user->sindico == 1 or $user->type == 'admin') {

         $ordemServicos = $this->ordemServico->all()->sortBy('created_at');
         $funcionarios = $this->funcionario->all();

         return view('OrdemDeServico.sindico-lista',compact('ordemServicos','title','users','apartamentos','moradores','funcionarios'));

       }else if ($user->type == 'morador') {
         $moradors = $this->morador->where('id_users', $id )->get();

         foreach ($moradors as $morador) {
           $ordemServicos = $this->ordemServico->where('id_moradors', $morador->id)->get();

         }
         $funcionarios = $this->funcionario->all();
         return view('OrdemDeServico.morador-lista',compact('title','ordemServicos','apartamentos','morador','user','funcionarios','users'));

       }else{

         return view('OrdemDeServico.index');

       }

     }

    public function newCreate($id)
    {
        $morador = $this->morador->where('id_users', $id)->first();
        $moradores = $this->morador->all();
        $users = $this->user->all();
        $apartamentos = $this->apartamento->all();
        $funcionarios = $this->funcionario->all();
        $title = " - Nova OS";
        $status = ['novo','atribuido'];
        return view('OrdemDeServico.create-edit',compact('title','status','morador','funcionarios','users','apartamentos','moradores'));
    }

    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrdemServicoFormRequest $request)
    {
        $dataForm = $request->all();
        $insert = $this->ordemServico->create($dataForm);
        $morador = $this->morador->find($dataForm['id_moradors']);

        if ($insert) {
          return redirect()->route('os.lista',$morador->id_users);
        }else{
          return redirect()->route('os.criar',$mroador->id_users);
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
        $title = " - Visualizar OS";
        $ordemServico = $this->ordemServico->find($id);
        $morador = $this->morador->find($ordemServico->id_moradors);
        $user = $this->user->find($morador->id_users);
        return view('OrdemDeServico.show',compact('title','ordemServico','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ordemServico = $this->ordemServico->find($id);

        $morador = $this->morador->find($ordemServico->id_moradors);
        $users = $this->user->all();
        $apartamentos = $this->apartamento->all();
        $funcionarios = $this->funcionario->all();
        $status = ['novo','atribuido','pendente','solucionado'];

        $title = " - Editar OS";
        return view('OrdemDeServico.create-edit',compact('ordemServico','title','morador','users','funcionarios','status','apartamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrdemServicoFormRequest $request, $id)
    {
        $dataForm = $request->all();
        $ordemServico = $this->ordemServico->find($id);

        $user = $this->user->where('name',$dataForm['solicitante'])->first();

        $update = $ordemServico->update($dataForm);

        if ($update) {
          return redirect()->route('os.lista',$user->id);
        }else {
          return redirect()->route('os.edit',$id)->withErrors("Erro ao editar");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
      $ordemServico = $this->ordemServico->find($id);
      $dataForm = $request->all();

      $delete = $ordemServico->delete();
      if ($delete) {
        return redirect()->route('os.lista',$dataForm['id_users']);
      }else {
        return redirect()->route('os.show',compact('id'))->withErrors('Erro ao deletar');
      }
    }

}
