<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PublishersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('books')->group(function () {
    Route::get('/', [BooksController::class, 'show']);
    Route::post('/', [BooksController::class, 'store']);
    Route::delete('/{title}', [BooksController::class, 'destroy']);
});

Route::prefix('authors')->group(function () {
    Route::get('/', [AuthorsController::class, 'show']);
    Route::post('/', [AuthorsController::class, 'store']);
    Route::delete('/{id}', [AuthorsController::class, 'destroy']);
});

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoriesController::class, 'show']);
    Route::post('/', [CategoriesController::class, 'store']);
    Route::delete('/{id}', [CategoriesController::class, 'destroy']);
});

Route::prefix('publishers')->group(function () {
    Route::get('/', [PublishersController::class, 'show']);
    Route::post('/', [PublishersController::class, 'store']);
    Route::delete('/{id}', [PublishersController::class, 'destroy']);
});