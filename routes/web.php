<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/auth/login', [AuthController::class, 'auth_login'])->name('auth_login');

Route::group(['middleware' => ['prevent-back-history', 'auth', 'web']], function () {
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth_logout');
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::group(['prefix' => 'employee'], function () {
        Route::get('/all', [EmployeeController::class, 'index'])->name('employee.list');
        Route::get('/create', [EmployeeController::class, 'create'])->name('employee.create');
        Route::post('/store', [EmployeeController::class, 'store'])->name('employee.store');
        Route::get('/show/{id}', [EmployeeController::class, 'show'])->name('employee.show');
        Route::put('/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
        Route::delete('/delete/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');
    });

    Route::group(['prefix' => 'department'], function () {
        Route::get('/all', [DepartmentController::class, 'index'])->name('department.list');
        Route::get('/create', [DepartmentController::class, 'create'])->name('department.create');
        Route::post('/store', [DepartmentController::class, 'store'])->name('department.store');
        Route::get('/show/{id}', [DepartmentController::class, 'show'])->name('department.show');
        Route::put('/update/{id}', [DepartmentController::class, 'update'])->name('department.update');
        Route::delete('/delete/{id}', [DepartmentController::class, 'delete'])->name('department.delete');
    });

});


