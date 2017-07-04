<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      private $product;
      public function __construct(Product $product)
      {
        $this->product = $product;
      }

    public function index()
    {
        $title = ' - Produtos';
        $products = $this->product->all();
        return view('Painel.products.index',compact('products','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = ' - Cadastro';
        $categories = ['eletronicos','banho','limpeza','moveis'];
        return view('Painel.products.create',compact('title','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //dd($request->only(['name','number']));
        //dd($request->except(['_token']));
        //dd($request->input('name'));
        $this->validate($request,$this->product->rules,$this->product->messages);

        $dataForm = $request->all();

        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;

        $insert = $this->product->create($dataForm);
        if($insert){
          return redirect()->route('produtos.index');
        }else{
          return redirect()->route('produtos.create');
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

    public function tests()
    {
      /*
      $insert = $this->product->create([
        'name' => 'nome do prdouto',
        'number' => 1231,
        'active' => false,
        'category' => 'eletronicos',
        'description' => 'descricao'
      ]);
      if ($insert) {
        return "Inserido com sucesso ID: {$insert->id}";
      }else{
        return "Nao inserido";
      }
      */
      /*
      //UPDATE BY ID
      $update = $this->product->find(5)->update([
        'name' => 'UpdateTest',
        'number' => 233232,
        'active' => true,
      ]);
      if($update){
        return "Update realizado com sucesso ";
      } else {
        return "Erro";
      }*/
      //UPDATE BY ATRIBUTE
      /*$update = $this->product->where('number',1231)->update([
        'name' => 'UpdateByNumber',
        'number' => 235232,
        'active' => false,
      ]);
      if($update){
        return "Update realizado com sucesso 2 ";
      } else {
        return "Erro";
      }*/
      //$delete = $this->product->find(5)->delete();
      /*$prod = $this->product->find(4);
      $delete = $prod->delete();
      */
      //$this->product->destroy([1,2,3]);
      //$delete = $this->product->where('number',235232)->delete();
      /*if ($delete) {
        return "Deletado com sucesso";
      }else {
        return "Erro ao deletear";
      }*/
    }
}
