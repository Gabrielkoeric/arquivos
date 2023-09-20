<?php

use App\Http\Controllers\CompraController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\IpController;
use App\Http\Controllers\MercadoPagoController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VendasController;
use App\Http\Middleware\Autenticador;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialiteController;


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
Route::get('/', [HomeController::class, 'index'])->name('home.index')->secure();

//Route::get('/', function () {
//    return view('welcome');
//});

//home
Route::get('/home', [HomeController::class, 'index'])->name('home.index')->secure();

//usuarios
Route::resource('/usuario', UsuarioController::class)->middleware(Autenticador::class);
//Produtos
Route::resource('/estoque', EstoqueController::class)->middleware(Autenticador::class);
//compra
Route::resource('/compra', CompraController::class)->middleware(Autenticador::class);
//vendas
Route::resource('/vendas', VendasController::class)->middleware(Autenticador::class);
//pedidos
Route::resource('/pedidos', PedidosController::class)->middleware(Autenticador::class);
//produtos
Route::resource('produtos', ProdutoController::class)->middleware(Autenticador::class);
//ip
Route::resource('ip', IpController::class);

Route::get('/checkout', [MercadoPagoController::class, 'iniciarPagamento'])->name('checkout')->middleware(Autenticador::class);
Route::post('/webhook', [MercadoPagoController::class, 'webhook'])->name('webhook');


//Route::get('login/google', "SocialiteController@redirectToProvider");
//Route::get('login/google/callback', 'SocialiteController@handleProviderCalback');
Route::get('login/google', [SocialiteController::class, 'redirectToProvider'])->name('login');
Route::get('login/google/callback', [SocialiteController::class, 'hendProviderCallback']);
Route::get('login/logout', [SocialiteController::class, 'destroy'])->name('logout');

Route::get('/email', function (){
    return new \App\Mail\NovoUsuario();
});
