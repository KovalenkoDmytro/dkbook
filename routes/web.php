<?php

use App\Http\Controllers\Auth\Registration\CreateController;
use App\Http\Controllers\Auth\Scheduled\CompanyScheduled\EditCompanyScheduled;
use App\Http\Controllers\Auth\Scheduled\EmployeeScheduled\EditEmployeeScheduled;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScheduledController;
use App\Http\Controllers\ServiceController;

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

    Route::get('/register-7', [CreateController::class, 'step7'] )->name('step7');
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
    Route::get('/scheduled/{id}/{table}', [ScheduledController::class, 'index'] )->name('index')->where(['id'=>'[0-9]+','table'=>'^((?!edit$).)*$']);
    Route::post('/scheduled', [ScheduledController::class, 'store'] )->name('store');
});
Route::name('scheduled.')->group(function (){
    Route::get('/company-scheduled/{id}/edit', [EditCompanyScheduled::class, 'index'] )->name('company.edit')->where('id','[0-9]+');
    Route::put('/company-scheduled/update', [EditCompanyScheduled::class, 'update'] )->name('company.update');
});
Route::name('scheduled.')->group(function (){
    Route::get('/employee-scheduled/{id}/edit', [EditEmployeeScheduled::class, 'index'] )->name('employee.edit')->where('id','[0-9]+');
    Route::put('/employee-scheduled/update', [EditEmployeeScheduled::class, 'update'] )->name('employee.update');
});



