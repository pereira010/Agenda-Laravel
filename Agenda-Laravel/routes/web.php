<?php

use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\PessoaController;
use App\Models\Eventos;
use App\Models\Pessoa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\apiController; //

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('pessoa')->group(function () {
    Route::get('/', [PessoaController::class, 'index']);
    Route::get('/create', [PessoaController::class, 'create']);
    Route::post('/store', [PessoaController::class, 'store'])->name('cadastro.pessoa');
});

Route::prefix('eventos')->group(function () {
    Route::get('/', [EventosController::class, 'index']);
    Route::get('/create', [EventosController::class, 'create']);
    Route::post('/store', [EventosController::class, 'store'])->name('cadastro.evento');
    Route::delete('/delete/{id}', [EventosController::class, 'destroy']);
});


Route::prefix('endereco')->group(function () {
    Route::get('/create', [EnderecoController::class, 'create']);
    Route::post('/store', [EnderecoController::class, 'store'])->name('cadastro.endereco');
    Route::get('/listar-enderecos', [EnderecoController::class, 'listarEnderecos']);
});


///////////// API NODE , EXPRESS


Route::get('all-post', [apiController::class,'getAllPost'])->name('post.all');
Route::get('single-post/{id}', [apiController::class,'getSinglePost'])->name('post.single');
Route::post('add-post', [apiController::class,'addPost'])->name('post.add');
Route::put('update-post', [apiController::class,'updatePost'])->name('post.update');
Route::delete('delete-post/{id}', [apiController::class,'deletePost'])->name('post.delete');

