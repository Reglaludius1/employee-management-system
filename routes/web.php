<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MailController;
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

Route::get('/', IndexController::class)->name('/');

Route::get('login', [AuthenticationController::class, 'login'])->name('login');
Route::post('login', [AuthenticationController::class, 'processLogin'])->name('login');
Route::get('register', [AuthenticationController::class, 'register'])->name('register');
Route::post('register', [AuthenticationController::class, 'processRegister'])->name('register');

Route::middleware('auth')->group(function () {
    Route::get('companies/{company}/showEmployees', [CompanyController::class, 'showEmployees'])->name('companies.employees');

    Route::resource('companies', CompanyController::class);
    Route::resource('companies.employees', EmployeeController::class);

    Route::get('/mail', [MailController::class, 'create'])->name('mail.create');
    Route::post('/mail', [MailController::class, 'send'])->name('mail.send');

    Route::post('logout', [AuthenticationController::class, 'logout'])->name('logout');
});
