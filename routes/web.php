<?php

use App\Repositories\LojasRepository;
use App\Repositories\ProdutosRepository;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/teste-email', function () {
    $loja = new LojasRepository();
    $loja = $loja->find(1);

    $produto = new ProdutosRepository();
    $produto = $produto->find($loja->produtos[0]->id);

    //return new \App\Mail\NovoProduto($produto, $loja);

    Mail::send(new \App\Mail\NovoProduto($produto, $loja));
});