<?php

use App\Http\Controllers\Auth\Dashboard\Appointment\AppointmentController;
use App\Http\Controllers\Auth\Dashboard\Calendar\DailyCalendarController;
use App\Http\Controllers\Auth\Dashboard\DashboardController;
use App\Http\Controllers\Auth\Dashboard\Calendar\CalendarController;
use App\Http\Controllers\Auth\Registration\CreateController;
use App\Http\Controllers\Auth\Scheduled\CompanyScheduled\CreateCompanyScheduled;
use App\Http\Controllers\Auth\Scheduled\CompanyScheduled\EditCompanyScheduled;
use App\Http\Controllers\Auth\Scheduled\EmployeeScheduled\CreateEmployeeScheduled;
use App\Http\Controllers\Auth\Scheduled\EmployeeScheduled\EditEmployeeScheduled;
use App\Http\Controllers\Auth\Scheduled\HomeScheduledController;
use App\Http\Controllers\Auth\User\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\View\Components\CreateDailyAppointmentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'] )->name('main');

Route::name('company.')->group(function (){

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
    Route::get('/scheduled/{id}/{table}', [HomeScheduledController::class, 'show'] )->name('index')->where(['id'=>'[0-9]+','table'=>'^((?!edit$).)*$']);
});
Route::name('scheduled.')->group(function (){
    Route::post('/company-scheduled/{id}/create', [CreateCompanyScheduled::class, 'store'] )->name('company.store')->where('id','[0-9]+');
    Route::get('/company-scheduled/{id}/edit', [EditCompanyScheduled::class, 'index'] )->name('company.edit')->where('id','[0-9]+');
    Route::put('/company-scheduled/update', [EditCompanyScheduled::class, 'update'] )->name('company.update');
});
Route::name('scheduled.')->group(function (){
    Route::post('/employee-scheduled/{id}/create', [CreateEmployeeScheduled::class, 'store'] )->name('employee.store')->where('id','[0-9]+');
    Route::get('/employee-scheduled/{id}/edit', [EditEmployeeScheduled::class, 'index'] )->name('employee.edit')->where('id','[0-9]+');
    Route::put('/employee-scheduled/update', [EditEmployeeScheduled::class, 'update'] )->name('employee.update');
});


Route::name('user.')->group(function (){
    Route::get('/login', [LoginController::class, 'index'] )->name('login');
    Route::post('/login', [LoginController::class, 'login'] );


    Route::get('/logout', [LoginController::class,'logout'] )->name('logout');
});

Route::name('dashboard.')->middleware('auth')->group(function (){
    Route::get('/main', [DashboardController::class, 'index'] )->name('main');
    Route::get('/calendar/month/{date?}', [CalendarController::class, 'index'] )->name('calendar');
    Route::get('/calendar/day/{date?}', [DailyCalendarController::class, 'index'] )->name('daily_calendar');

    Route::get('/employees', [EmployeeController::class, 'show'] )->name('employees');


//    Route::get('/createDailyAppointment/{date}', [CreateDailyAppointmentController::class, 'index'] )->name('createDailyAppointment');



    Route::get('/appointment/create/{date}', [AppointmentController::class, 'index'] )->name('index');
    Route::post('/appointment/create', [AppointmentController::class, 'store'] )->name('store');



});

