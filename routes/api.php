<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

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

// Route::get('/all-coffee', [HomeController::class, 'all_coffe']);

// Route::middleware('guest')->group(function () {
//     // Route::get('register', [RegisteredUserController::class, 'create'])
//     // ->name('register');
// });
Route::post('/register', [RegisteredUserController::class, 'register']);
