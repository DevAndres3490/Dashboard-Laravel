<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;


//Route::get('/', HomeController::class);

//Auth::routes();



Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/registro', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.create');
Route::get('/home', [HomeController::class, 'home'])->middleware('auth')->name('home');
Route::post('/login', [AuthController::class, 'iniciasesion'])->name('login.iniciasesion');
Route::get('/cerrarsesion',[AuthController::class, 'cerrarsesion'])->name('cerrarsesion');


Route::get('/usuarios', [UserController::class, 'show'])->name('usuarios.index');
Route::post('/usuarios/store', [UserController::class, 'store'])->name('usuarios.store');
Route::delete('/usuarios{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');
Route::get('/usuarios/{id}/editar', [UserController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios{id}', [UserController::class, 'update'])->name('usuarios.update');

Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
Route::delete('/roles{id}',[RoleController::class, 'destroy'])->name('roles.destroy');
Route::get('/usuaios{id}/editar', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('/roles{id}', [RoleController::class, 'update'])->name('roles.update');


Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::post('/categorias',[CategoriaController::class, 'store'])->name('categorias.store');
Route::delete('/categorias{id}',[CategoriaController::class, 'destroy'])->name('categorias.destroy');
Route::get('/categorias{id}/editar', [CategoriaController::class, 'edit'])->name('categorias.edit');
Route::put('/categorias{id}',[CategoriaController::class, 'update'])->name('categorias.update');

Route::get('/productos', [ProductosController::class, 'show'])->name('productos.index');
Route::get('/productos/create', [ProductosController::class, 'create'])->name('productos.create');
Route::post('/productos/store', [ProductosController::class, 'store'])->name('productos.store');
Route::delete('/productos{id}', [ProductosController::class, 'destroy'])->name('productos.destroy');
Route::get('/productos{id}/editar', [ProductosController::class, 'edit'])->name('productos.edit');
Route::put('/productos{id}', [ProductosController::class, 'update'])->name('productos.update');

Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::get('/perfil{id}/editar', [PerfilController::class, 'edit'])->name('perfil.edit');
Route::put('/perfil/{id}', [PerfilController::class, 'update'])->name('perfil.update');


Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario.index');



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
