<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeloController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BooksController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return response()->json([
        'message' => 'Hello World',
        'code' => 'INPO MIN',
        'saya' => [
            'nama' => 'adit',
            'umur' => 17,
            'alamat' => 'Jl. Raya Cibaduyut',
            'hobi' => 'Coding'
        ]
    ], 200);;
});

Route::resource('/helo', HeloController::class, [
    'only' => ['index']
]);
Route::resource('siswa', SiswaController::class);

Route::resource('author', AuthorController::class);

Route::resource('Book', BooksController::class);