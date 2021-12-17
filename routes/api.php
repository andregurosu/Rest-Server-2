<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PesananController;
// use App\Models\Pesanan;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\API\PesananController;

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

Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);

Route::middleware('auth:sanctum')->group( function() {
    Route::resource('pesanan', PesananController::class);
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('pesanan',[PesananController::class,'index']);
// Route::post('pesanan',[PesananController::class,'create']);
// Route::get('/pesanan/{nama}',[PesananController::class,'dariNama']);
// Route::put('/pesanan/{id}',[PesananController::class,'update']);
// Route::delete('/pesanan/{id}',[PesananController::class,'delete']);
