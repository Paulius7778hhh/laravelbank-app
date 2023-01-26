<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\create;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AccountlistController as A;

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
Route::get('/doryuken/show/{number}', [create::class, 'show'])->name('menu');
Route::get('/form', [PostController::class, 'showForm'])->name('showForm');
Route::post('/form', [PostController::class, 'doForm'])->name('doForm');
Route::get('/welcome', [PostController::class, 'welc']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin/account')->name('account-')->group(function () {
    Route::get('/', [A::class, 'index'])->name('index');
    Route::get('/create', [A::class, 'create'])->name('create');
    Route::post('/create', [A::class, 'store'])->name('store');
    Route::get('/edit/{account}', [A::class, 'edit'])->name('edit');
    Route::put('/edit/{account}', [A::class, 'update'])->name('update');
    Route::delete('/delete/{account}', [A::class, 'destroy'])->name('delete');
    Route::get('/create', [create::class, 'show'])->name('menu');
});
