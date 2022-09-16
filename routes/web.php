<?php

use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Auth\IndexController;
use App\Http\Controllers\Auth\Registration\CreateController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScheduledController;
use App\Http\Controllers\ServiceController;
use App\View\Components\DataTimePicker\DateTimePicker;
use Illuminate\Support\Facades\Route;


Route::name('company.')->group(function (){
    Route::get('/', [HomeController::class, 'index'] )->name('main');
    Route::get('/register-1', [CreateController::class, 'step1'] )->name('step1');
    Route::post('/register-1', [CreateController::class, 'createOwner'] )->name('createOwner');

    Route::get('/register-2', [CreateController::class, 'step2'] )->name('step2');
    Route::post('/register-2', [CreateController::class, 'createCompany'] )->name('createCompany');

    Route::get('/register-3', [CreateController::class, 'step3'] )->name('step3');
    Route::post('/register-3', [CreateController::class, 'addPhotoCompany'] )->name('addPhotoCompany');

    Route::get('/register-4', [CreateController::class, 'step4'] )->name('step4');

    Route::get('/register-5', [CreateController::class, 'step5'] )->name('step5');

    Route::get('/register-6', [CreateController::class, 'step6'] )->name('step6');
});

Route::name('services.')->group(function (){
    Route::get('/services', [ServiceController::class, 'index'] )->name('index');
    Route::post('/services', [ServiceController::class, 'store'] )->name('store');
    Route::put('/services/{id}', [ServiceController::class, 'update'] )->name('update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'] )->name('destroy');
});

Route::name('employee.')->group(function (){
    Route::get('/employee', [EmployeeController::class, 'index'] )->name('index');
    Route::post('/employee', [EmployeeController::class, 'store'] )->name('store');
    Route::put('/employee/{id}', [EmployeeController::class, 'update'] )->name('update');
    Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'] )->name('destroy');
});

Route::name('scheduled.')->group(function (){
    Route::get('/scheduled/{id}/{name}', [ScheduledController::class, 'index'] )->name('index');
    Route::post('/scheduled', [ScheduledController::class, 'store'] )->name('store');
});




//Route::post('/register', [CreateController::class, 'createCompany'] )->name('createCompany');
//Route::post('/addTime', [DateTimePicker::class, 'create'] )->name('createScheduledTime');




//Route::name('admin')->middleware('admin')->group(function (){
//    Route::get('/dashboard', [Dashboard::class, 'index'] );
//
//});




