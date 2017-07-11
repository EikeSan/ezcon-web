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
Route::get('/Painel/produtos/fone','Painel\ProdutoController@foneView');
Route::post('/Painel/produtos/fone','Painel\ProdutoController@fone')->name('produtos.fone');
Route::get('/painel/produtos/teste','Painel\ProdutoController@tests');
Route::get('/painel/produtos/create','Painel\ProdutoController@create');
Route::post('/Painel/produtos/store','Painel\ProdutoController@store');


Route::resource('/painel/produtos','Painel\ProdutoController');

Route::group(['namespace' => 'Site'],function(){
  Route::get('/contato',[ 'as' => 'contato', 'uses' => 'SiteController@contato']);
  Route::resource('/','SiteController');
});


Auth::routes();


Route::resource('/home', 'Admin\AdminController');
Route::post('/cadastrar','Admin\AdminController@cadastrarUser')->name('cadastrar');
Route::post('/cadastrar2','Admin\AdminController@vinculaMorador')->name('cadastrar2');

Route::resource('/morador','Morador\MoradorController');

Route::resource('/funcionario','Funcionario\FuncionarioController');

Route::resource('/sindico','Sindico\SindicoController');
