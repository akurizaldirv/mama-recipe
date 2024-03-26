<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;

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

Route::get('/home', function () {
    return redirect("/");
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/add', [HomeController::class, 'addRecipe'])->name('addRecipe')->middleware('auth');
Route::post('/add', [RecipeController::class, 'save'])->name('saveRecipe')->middleware('auth');
Route::post('/update', [RecipeController::class, 'updateRecipe'])->name('updateRecipe')->middleware('auth');

Route::get('/recipe', [RecipeController::class, 'getReport'])->middleware('auth');
Route::get('/recipe/{id}', [RecipeController::class, 'getOne'])->middleware('auth');
Route::get('/recipe/{id}/update', [RecipeController::class, 'update'])->middleware('auth');
Route::get('/recipe/{id}/delete', [RecipeController::class, 'delete'])->middleware('auth');
