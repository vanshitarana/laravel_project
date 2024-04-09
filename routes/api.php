<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ResetPasswordController;
use App\Http\Controllers\Api\ChangePasswordController;
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


Route::post('/register', [AuthController::class, 'register']);


Route::post('/login', [AuthController::class, 'login']);

Route::post('/user', [AuthController::class, 'getUserDetails']);

Route::post('/resetPassword', [AuthController::class, 'change_password'])->middleware('auth:sanctum');


Route::post('/sendPaawordResetLink', [ResetPasswordController::class, 'sendEmail'])->middleware('auth:sanctum');
Route::post('/PasswordReset', [ChangePasswordController::class, 'passwordResetProcess'])->middleware('auth:sanctum');
// Route::post('sendEmail', 'App\Http\Controllers\MailController@sendEmail');
   


