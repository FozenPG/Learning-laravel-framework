<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[MainController::class, 'index'])->name('site.index');

Route::get('/sobre-nos',[SobreNosController::class, 'index'])->name('site.sobrenos');

Route::get('/contato',[ContatoController::class, 'index'])->name('site.contato');
Route::post('/contato',[ContatoController::class, 'index'])->name('site.contato');

Route::get('/login')->name('site.login');

Route::prefix('/app')->group( function(){
    
    Route::get('/clientes')->name('app.clientes');
    
    Route::get('/fornecedores',[FornecedorController::class, 'index'])->name('app.fornecedores');
    
    Route::get('/produtos')->name('app.produtos');

});

Route::fallback(function() {
    echo 'A rota acessada não existe <a href="'.route('site.index').'">clique aqui</a> para voltar a navegação normal';
});

Route::get('/teste/{p1}/{p2}',[TesteController::class, 'index'])->name('teste');