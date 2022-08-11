<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EmployeeTaskController;
use App\Http\Controllers\userAdminController;
use App\Http\Controllers\Employee\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Employee\HomeController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('admin',userAdminController::class)->middleware(['auth'])->name('index','admin');
Route::resource('employee',EmployeeController::class)->middleware(['auth'])->name('index','employee');
Route::resource('task',TaskController::class)->middleware(['auth'])->name('index','task');

Route::resource('EmployeeTask',EmployeeTaskController::class)->middleware('isEmployee')->name('index','EmployeeTask');



//Employee

Route::namespace('Employee-log')->prefix('employee-log')->name('employee-log.')->group(function(){
    Route::namespace('Auth')->middleware('guest:employee')->group(function(){
        //login route
        Route::get('login',[AuthenticatedSessionController::class,'create'])->name('login');
        Route::post('login',[AuthenticatedSessionController::class,'store'])->name('employeeLogin');
    });
    Route::middleware('isEmployee')->group(function(){
        Route::get('dashboard',[HomeController::class,'index'])->name('dashboard');
    });
    Route::post('logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');

   


});


require __DIR__.'/auth.php';
