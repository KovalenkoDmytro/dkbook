<?php

use App\Http\Controllers\Auth\AppointmentController;
use App\Http\Controllers\Auth\Calendars\CalendarController;
use App\Http\Controllers\Auth\Calendars\DailyCalendarController;
use App\Http\Controllers\Auth\ClientController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\EmployeeController;
use App\Http\Controllers\Auth\Scheduleds\CompanyScheduled\CreateCompanyScheduled;
use App\Http\Controllers\Auth\Scheduleds\CompanyScheduled\EditCompanyScheduled;
use App\Http\Controllers\Auth\Scheduleds\EmployeeScheduled\CreateEmployeeScheduled;
use App\Http\Controllers\Auth\Scheduleds\EmployeeScheduled\EditEmployeeScheduled;
use App\Http\Controllers\Auth\Scheduleds\HomeScheduledController;
use App\Http\Controllers\Auth\ServiceController;
use App\Http\Controllers\Auth\User\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Registration\CreateController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'] )->name('main');

Route::name('registration.')->group(function (){
    Route::get('/step1', [CreateController::class, 'step1'] )->name('step1');
    Route::post('/step1', [CreateController::class, 'createOwner'] )->name('createOwner');
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
    Route::get('/employees', [EmployeeController::class, 'index'] )->name('index');
    Route::get('/employee/create', [EmployeeController::class, 'create'] )->name('create');
    Route::post('/employee/create', [EmployeeController::class, 'store'] )->name('store');
    Route::get('/employee/{id}', [EmployeeController::class, 'show'] )->name('show');
    Route::put('/employee/update/{id}', [EmployeeController::class, 'update'] )->name('update');
    Route::delete('/employee/destroy/{id}', [EmployeeController::class, 'destroy'] )->name('destroy');
    Route::post('/employees/available', [EmployeeController::class, 'getAvailableEmployee'] );
});
Route::name('client.')->middleware('auth')->group(function (){
    Route::get('/client', [ClientController::class, 'index'] )->name('index');
    Route::get('/client/create', [ClientController::class, 'create'] )->name('create');
    Route::post('/client/create', [ClientController::class, 'store'] )->name('store');
    Route::get('/client/{id}', [ClientController::class, 'show'] )->name('show');
    Route::put('/client/update/{id}', [ClientController::class, 'update'] )->name('update');
    Route::delete('/client/destroy/{id}', [ClientController::class, 'destroy'] )->name('destroy');
});
Route::name('scheduled.')->group(function (){
    // scheduled company
    Route::get('/scheduled/{id}/{table}', [HomeScheduledController::class, 'show'] )->name('index')->where(['id'=>'[0-9]+','table'=>'^((?!edit$).)*$']);
    Route::post('/company-scheduled/{id}/create', [CreateCompanyScheduled::class, 'store'] )->name('company.store')->where('id','[0-9]+');
    Route::get('/company-scheduled/{id}/edit', [EditCompanyScheduled::class, 'index'] )->name('company.edit')->where('id','[0-9]+');
    Route::put('/company-scheduled/update', [EditCompanyScheduled::class, 'update'] )->name('company.update');
    //scheduled employee
    Route::post('/employee-scheduled/{id}/create', [CreateEmployeeScheduled::class, 'store'] )->name('employee.store')->where('id','[0-9]+');
    Route::get('/employee-scheduled/{id}/edit', [EditEmployeeScheduled::class, 'index'] )->name('employee.edit')->where('id','[0-9]+');
    Route::put('/employee-scheduled/update', [EditEmployeeScheduled::class, 'update'] )->name('employee.update');
});
Route::name('user.')->group(function (){
    Route::get('/login', [LoginController::class, 'index'] )->name('login');
    Route::post('/login', [LoginController::class, 'login'] );
    Route::get('/logout', [LoginController::class,'logout'] )->name('logout');
});



Route::name('monthlyCalendar.')->middleware('auth')->group(function (){
    Route::get('/calendar/month/{date?}', [CalendarController::class, 'index'] )->name('index');
});

Route::name('dailyCalendar.')->middleware('auth')->group(function (){
    Route::get('/calendar/day/{date?}', [DailyCalendarController::class, 'index'] )->name('index');
});


Route::name('dashboard.')->middleware('auth')->group(function (){
    Route::get('/main', [DashboardController::class, 'index'] )->name('main');



    //appointment
    Route::get('/appointment/create/{date}', [AppointmentController::class, 'index'] )->name('index');
    Route::post('/appointment/create', [AppointmentController::class, 'store'] )->name('store');



});

