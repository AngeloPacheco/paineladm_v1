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

/*    HOME    */
Route::get('/painel', 'Painel\PainelController@index');

/*   CONFIGURAÇÕES  */
Route::get('/painel/configuracoes', 'Painel\ConfiguracaoController@index');

/*   MEDIDAS  */
Route::resource('/painel/medidas', 'Painel\MedidaController');
Route::get('/painel/medidas/delete/{id}', 'Painel\MedidaController@destroy');

/*   CATEGORIAS */
Route::resource('/painel/categoria-produtos', 'Painel\CategoriaProdutoController');
Route::get('/painel/categoria-produtos/delete/{id}', 'Painel\CategoriaProdutoController@destroy');

/*   EMPRESA  */
Route::resource('/painel/empresa', 'Painel\EmpresaController');

/*  TRANSPORTADORAS    */
Route::resource('/painel/transportadoras', 'Painel\TransportadoraController');
Route::get('/painel/transportadoras/busca', 'Painel\TransportadoraController@busca');
Route::post('/painel/transportadoras/busca', 'Painel\TransportadoraController@busca');
Route::get('/painel/transportadoras/delete/{id}', 'Painel\TransportadoraController@destroy');

/*   CATEGORIAS CONTAS A PAGAR */
Route::get('/painel/categorias-contas-pagar/delete/{id}', 'Painel\CategoriaContasPagarController@destroy');
Route::resource('/painel/categorias-contas-pagar', 'Painel\CategoriaContasPagarController');
Route::get('/painel/categorias-contas-pagar/busca', 'Painel\CategoriaPagarController@busca');
Route::post('/painel/categorias-contas-pagar/busca', 'Painel\CategoriaPagarController@busca');


Route::get('/', function () {
    return view('welcome');
});
