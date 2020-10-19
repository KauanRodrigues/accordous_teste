<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

/**
 * Rota responsavel por carregar a tela de login
 */
Route::get('/', function () {
    return view('login');
})->name('login');

/**
 * Rota responsável por realizar o login
 */
Route::post('/logar', [LoginController::Class, 'logar']);

/**
 * Rota responsável por direcional o usuario para a tela home do sistema
 */
Route::get('/home', 'HomeController@index')->name('home');

/**
 * ROUTE CADASTRO
 */

// Responsável por redirecionar o usuario para a tela de cadastro de funcionários.
Route::get('/cadastro/funcionarios', 'FuncionariosController@create')->name('cadastro.funcionarios');

// Responsável pela inserção dos dados do funcionário no banco de dados
Route::post('/cadastro/funcionarios', 'FuncionariosController@store');

// Responsável por redirecionar o usuário para a tela de cadastro de proprietários
Route::get('/cadastro/proprietarios', 'ProprietariosController@create')->name('cadastro.proprietarios');

// Responsável pela inserção dos dados do proprietário no banco de dados
Route::post('/cadastro/proprietarios', 'ProprietariosController@store');

// Responsável por buscar os proprietários cadastrados
Route::post('/get_proprietario', 'ProprietariosController@get_proprietario');

// Responsável por redirecionar o usuário para a tela de cadastro de imóveis
Route::get('/cadastro/imoveis', 'ImoveisController@create')->name('cadastro.imoveis');

// Responsável pela inserção dos imóveis no banco de dados
Route::post('/cadastro/imoveis', 'ImoveisController@store');
/**
 * END ROUTE CADASTRO
 */

/**
 * ROUTE OPERAÇÕES
 */

 Route::get('/operacoes/aluguel', 'AlugueisController@create')->name('operacoes.aluguel');
 Route::post('/operacoes/aluguel', 'AlugueisController@store');
 Route::post('/operacoes/get_all_imoveis', 'AlugueisController@get_all_imoveis');
 /**
  * END ROUTE OPERAÇÕES
  */

/**
 * ROUTE RELATÓRIOS
 */

// Responsável por redirecionar o usuário para a tela de relatórios de imóveis
Route::get('/relatorio/imoveis', 'ImoveisController@index')->name('relatorio.imoveis');

// Responsável por buscar os imóveis cadastrados na tela de relatórios
Route::post('/relatorio/get_imoveis', 'ImoveisController@get_imoveis');

// Responsável por excluir o imóvel
Route::post('/relatorio/deletar_imovel', 'ImoveisController@destroy');

// Responsável por redirecionar o usuário para a tela de relatórios de funcionarios
Route::get('/relatorio/funcionario', 'FuncionariosController@index')->name('relatorio.funcionarios');
Route::post('/relatorio/get_all_funcionarios', 'FuncionariosController@get_all_funcionarios');

// Responsável por redirecionar o usuário para a tela de relatórios de funcionarios
Route::get('/relatorio/proprietario', 'ProprietariosController@index')->name('relatorio.proprietarios');
Route::post('/relatorio/get_all_proprietarios', 'ProprietariosController@get_all_proprietarios');
/**
 * END ROUTE RELATÓRIOS
 */

 Route::get('/logout', 'LoginController@logout')->name('logout');