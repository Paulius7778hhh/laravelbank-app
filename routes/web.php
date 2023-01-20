<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\create;
use App\Http\Controllers\PostController;

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
Route::get('/kaioken/times/two/{pc}', fn () => 'the last one after "/" is variable requires any input to be in it to work');
Route::get('/genkidama/{a}/{b}', [create::class, 'wel']);
Route::get('/shoryuken/{a}/{b}', [create::class, 'FunctionName']);
Route::get('/doryuken/show/{number}', [create::class, 'show'])->name('menu');
Route::get('/form', [PostController::class, 'showForm'])->name('showForm');
Route::post('/form', [PostController::class, 'doForm'])->name('doForm');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
