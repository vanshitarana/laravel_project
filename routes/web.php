<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\RegistrationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/vue', function () {
//     return view('vue');
// });


// Route::get('/student', [RegistrationController::class, 'index'])->name('index');
// Route::post('/store', [RegistrationController::class, 'store'])->name('store');
// Route::get('/view', [RegistrationController::class, 'show'])->name('students.show');
// Route::get('/edit', [RegistrationController::class, 'edit'])->name('students.edit');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'products' => ProductController::class,
]);
