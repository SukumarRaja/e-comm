<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Customer\CustomerController;

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

// profile
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('profile/get', [CustomerController::class, 'profile']);
    Route::post('profile/update', [CustomerController::class, 'update']);
    Route::get('logout', [CustomerController::class, 'logout']);
});

Route::post('register', [CustomerController::class, 'register']);
Route::post('login', [CustomerController::class, 'login']);
