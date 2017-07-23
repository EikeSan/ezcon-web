<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
//Rota de produtos

Route::get('/Painel/produtos/fone','Painel\ProdutoController@foneView');
Route::post('/Painel/produtos/fone','Painel\ProdutoController@fone')->name('produtos.fone');
Route::get('/painel/produtos/teste','Painel\ProdutoController@tests');
Route::get('/painel/produtos/create','Painel\ProdutoController@create');
Route::post('/Painel/produtos/store','Painel\ProdutoController@store');

Route::resource('/painel/produtos','Painel\ProdutoController');
*/

Route::group(['namespace' => 'Site'],function(){
  Route::get('/contato',[ 'as' => 'contato', 'uses' => 'SiteController@contato']);
  Route::resource('/','SiteController');
});

//Rotas de Autenticação

Auth::routes();

//Rotas para operações com administrador

Route::resource('/home', 'Admin\AdminController');

//Rotas para operações com morador

Route::post('/morador/store2','Morador\MoradorController@store2')->name('morador.store2');
Route::get('/morador/edit2/{id}','Morador\MoradorController@edit2')->name('morador.edit2');
Route::put('/morador/update2/{id}','Morador\MoradorController@update2')->name('morador.update2');
Route::resource('/morador','Morador\MoradorController');

//Rotas para Funcionarios

Route::get('/funcionario/lista','Funcionario\FuncionarioController@lista')->name('funcionario.lista');
Route::post('/funcionario/store2','Funcionario\FuncionarioController@store2')->name('funcionario.store2');
Route::get('/funcionario/edit2/{id}','Funcionario\FuncionarioController@edit2')->name('funcionario.edit2');
Route::put('/funcionario/update2/{id}','Funcionario\FuncionarioController@update2')->name('funcionario.update2');
Route::get('/funcionario/fire/{id}','Funcionario\FuncionarioController@fire')->name('funcionario.fire');
Route::resource('/funcionario','Funcionario\FuncionarioController');

//Rotas para Sindico

Route::resource('/sindico','Sindico\SindicoController');

//Rotas para Ordem de Serviço
Route::get('/os/lista/{id}','OrdemServico\OrdemServicoController@lista')->name('os.lista');
Route::get('/os/criar/{id}','OrdemServico\OrdemServicoController@newCreate')->name('os.criar');
Route::post('/os/deletar/','OrdemServico\OrdemServicoController@deletar')->name('os.deletar');
Route::resource('/os','OrdemServico\OrdemServicoController');

//Rotas para acompanhamento
Route::get('/acompanhamento/lista/{id}','Acompanhamento\AcompanhamentoController@lista')->name('acompanhamento.lista');
Route::get('/acompanhamento/criar/{id}','Acompanhamento\AcompanhamentoController@criar')->name('acompanhamento.criar');
Route::resource('/acompanhamento','Acompanhamento\AcompanhamentoController');
