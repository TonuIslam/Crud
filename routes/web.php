<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// category
Route::get('Category/All', [App\Http\Controllers\CategoryController::class, 'AllCat'])->name('all.category');
Route::post('Category/Add', [App\Http\Controllers\CategoryController::class, 'AddCat'])->name('store.category');
Route::get('Category/Edit/{id}', [App\Http\Controllers\CategoryController::class, 'Edit']);
Route::post('Store/Category/{id}', [App\Http\Controllers\CategoryController::class, 'update']);
Route::get('softdelete/Category/{id}', [App\Http\Controllers\CategoryController::class, 'softdelete']);
Route::get('Category/Restore/{id}', [App\Http\Controllers\CategoryController::class, 'Restore']);
Route::get('Category/P_Delete/{id}', [App\Http\Controllers\CategoryController::class, 'P_Delete']);