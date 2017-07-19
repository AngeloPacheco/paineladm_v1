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

/*   CATEGORIAS DE PRODUTOS */
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
Route::get('/painel/categoria-contas-pagar/delete/{id}', 'Painel\CategoriaContasPagarController@destroy');
Route::resource('/painel/categoria-contas-pagar', 'Painel\CategoriaContasPagarController');
Route::get('/painel/categoria-contas-pagar/busca', 'Painel\CategoriaPagarController@busca');
Route::post('/painel/categoria-contas-pagar/busca', 'Painel\CategoriaPagarController@busca');

/*   FORMA DE PAGAMENTOS */
Route::get('/painel/forma-pagamentos/delete/{id}', 'Painel\FormaPagamentoController@destroy');
Route::resource('/painel/forma-de-pagamentos', 'Painel\FormaPagamentoController');
Route::get('/painel/forma-de-pagamentos/busca', 'Painel\FormaPagamentoController@busca');
Route::post('/painel/forma-de-pagamentos/busca', 'Painel\FormaPagamentoController@busca');

/*   FORNECEDORES */
Route::resource('/painel/fornecedores', 'Painel\FornecedorController');
Route::get('/painel/fornecedores/busca', 'Painel\FornecedorController@busca');
Route::post('/painel/fornecedores/busca', 'Painel\FornecedorController@busca');
Route::get('/painel/fornecedores/delete/{id}', 'Painel\FornecedorController@destroy');

/*   PRODUTOS    */
Route::resource('/painel/produtos', 'Painel\ProdutoController');
Route::get('/painel/produtos/busca', 'Painel\ProdutoController@busca');
Route::post('/painel/produtos/busca', 'Painel\ProdutoController@busca');
Route::get('/painel/produtos/delete/{id}', 'Painel\ProdutoController@destroy');

/*   COMPRAS    */
Route::resource('/painel/compras', 'Painel\CompraController');
Route::get('/painel/compras/busca', 'Painel\CompraController@busca');
Route::post('/painel/compras/busca', 'Painel\CompraController@busca');
Route::get('/painel/compras/delete/{id}', 'Painel\CompraController@destroy');



Route::get('/', function () {
    return view('welcome');
});
