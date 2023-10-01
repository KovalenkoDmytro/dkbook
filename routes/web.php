<?php

use App\Http\Controllers\Auth\AppointmentController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\Schedules\CompanyScheduledController;
use App\Http\Controllers\Auth\Schedules\EmployeeScheduledController;
use App\Http\Controllers\Auth\User\ForgotPasswordController;
use App\Http\Controllers\Auth\User\LoginController;
use App\Http\Controllers\Auth\User\ResetPasswordController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyOwnerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Registration\CreateController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'] )->name('main');
Route::name('user.')->group(function (){
    Route::get('/login', [LoginController::class, 'index'] )->name('login');
    Route::post('/login', [LoginController::class, 'login'] );
    Route::get('/logout', [LoginController::class,'logout'] )->name('logout');
});

Route::name('password.')->middleware('guest')->group(function () {
    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('email');
    Route::get('/reset-password', [ResetPasswordController::class, 'index'])->name('reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('reset');
});

Route::name('registration.')->group(function (){
    Route::get('/registration/step1', [CreateController::class, 'step1'] )->name('step1');
    Route::get('/registration/step2', [CreateController::class, 'step2'] )->name('step2');
    Route::get('/registration/step3', [CreateController::class, 'step3'] )->name('step3');
    Route::post('/registration/step3', [CreateController::class, 'addPhotoCompany'] )->name('addPhotoCompany');
    Route::get('/registration/step4', [CreateController::class, 'step4'] )->name('step4');
    Route::get('/registration/step5', [CreateController::class, 'step5'] )->name('step5');
    Route::get('/registration/step6', [CreateController::class, 'step6'] )->name('step6');
    Route::get('/registration/step7', [CreateController::class, 'step7'] )->name('step7');
});

Route::name('company.')->group(function (){
    Route::post('/registration/step2', [CompanyController::class, 'store'] )->name('store');
    Route::put('/company', [CompanyController::class, 'update'] )->name('update');
});

Route::name('companyOwner.')->group(function (){
    Route::post('/companyOwner', [CompanyOwnerController::class, 'store'] )->name('store');
    Route::put('/companyOwner', [CompanyOwnerController::class, 'update'] )->name('update');
});


Route::resource('employee',EmployeeController::class)->middleware('auth');
Route::resource('client',ClientController::class)->middleware('auth');
Route::resource('service',ServiceController::class)->middleware('auth');
Route::match(['get'],'/calendar', [CalendarController::class, 'index'] )->name('calendar')->middleware('auth');
Route::post('company/{id}/appointments', [CalendarController::class, 'ajaxAppointments'])->middleware('auth');

//Route::name('dailyCalendar.')->middleware('auth')->group(function (){
//    Route::get('/calendar/day/{date?}', [DailyCalendarController::class, 'index'] )->name('index');
//});

Route::name('employeeScheduled.')->group(function (){
    Route::get('/employeeScheduled/{id}/edit', [EmployeeScheduledController::class, 'edit'] )->name('edit');
    Route::put('/employeeScheduled/{id}', [EmployeeScheduledController::class, 'update'] )->name('update');
});

Route::name('companyScheduled.')->group(function (){
    Route::post('/companyScheduled/', [CompanyScheduledController::class, 'update'] )->name('update');
});

Route::name('dashboard.')->middleware('auth')->group(function (){
    Route::get('/main', [DashboardController::class, 'index'] )->name('main');
    //appointment
    Route::get('/appointment/create/{date}', [AppointmentController::class, 'index'] )->name('index');
    Route::post('/appointment/create', [AppointmentController::class, 'store'] )->name('store');
});

