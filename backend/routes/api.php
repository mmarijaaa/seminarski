<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController\DRController;
use App\Http\Controllers\AuthController\PacijentController; 


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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('/register', [DRController::class, 'register']);
Route::post('/login', [DRController::class, 'login']);

Route::group(['middleware'=> ['auth:sanctum']], function() {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    Route::post('/logout', [DRController::class, 'logout']);
 
});



Route::post('/registerpacijent', [PacijentController::class, 'registerpacijent']);
Route::post('/loginpacijent', [PacijentController::class, 'loginpacijent']);

Route::group(['middleware'=> ['auth:sanctum','abilities:pacijent']], function() {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    Route::post('/logoutpacijent', [PacijentController::class, 'logoutpacijent']);
 
});



