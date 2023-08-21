<?php

use App\Http\Controllers\ArticleConfController;
use App\Http\Controllers\CategorieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(CategorieController::class)->prefix("categories")->group(function () {
    Route::get('/', 'all');
    Route::post('/', 'store');
    Route::get('/search', 'byLibelle');
    Route::put('/{categorie}', 'update');
    Route::delete('/{id?}', 'delete');
   
});

Route::controller(ArticleConfController::class)->prefix("articles")->group(function () {
    Route::get('/', 'all');
    Route::post('/', 'store');
   
});