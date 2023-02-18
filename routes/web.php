<?php

use App\Http\Controllers\Auth\AppointmentController;
use App\Http\Controllers\Auth\Calendars\CalendarController;
use App\Http\Controllers\Auth\Calendars\DailyCalendarController;
use App\Http\Controllers\Auth\ClientController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\EmployeeController;
use App\Http\Controllers\Auth\Schedules\CompanyScheduledController;
use App\Http\Controllers\Auth\Schedules\EmployeeScheduledController;
use App\Http\Controllers\Auth\ServiceController;
use App\Http\Controllers\Auth\User\ForgotPasswordController;
use App\Http\Controllers\Auth\User\LoginController;
use App\Http\Controllers\Auth\User\ResetPasswordController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyOwnerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Registration\CreateController;
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

Route::name('services.')->group(function (){
    Route::get('/services', [ServiceController::class, 'index'] )->name('index');
    Route::get('/service/create', [ServiceController::class, 'create'] )->name('create');
    Route::post('/service', [ServiceController::class, 'store'] )->name('store');
    Route::get('/service/{id}/edit', [ServiceController::class, 'edit'] )->name('edit');
    Route::put('/service/{id}', [ServiceController::class, 'update'] )->name('update');
    Route::delete('/service/{id}', [ServiceController::class, 'destroy'] )->name('destroy');
    Route::post('/ajax/service/', [ServiceController::class, 'ajaxStore'] )->name('ajaxStore');
});

Route::name('employee.')->group(function (){
    Route::get('/employees', [EmployeeController::class, 'index'] )->name('index');
    Route::get('/employee/create', [EmployeeController::class, 'create'] )->name('create');
    Route::post('/employee', [EmployeeController::class, 'store'] )->name('store');
    Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'] )->name('edit');
    Route::put('/employee/{id}', [EmployeeController::class, 'update'] )->name('update');
    Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'] )->name('destroy');
    Route::post('/employees/available', [EmployeeController::class, 'getAvailableEmployee'] );
    Route::post('/ajax/employee/', [EmployeeController::class, 'ajaxStore'] )->name('ajaxStore');
});

Route::name('client.')->middleware('auth')->group(function (){
    Route::get('/clients', [ClientController::class, 'index'] )->name('index');
    Route::get('/client/create', [ClientController::class, 'create'] )->name('create');
    Route::post('/client', [ClientController::class, 'store'] )->name('store');
    Route::get('/client/{id}', [ClientController::class, 'edit'] )->name('edit');
    Route::put('/client/{id}', [ClientController::class, 'update'] )->name('update');
});

Route::name('monthlyCalendar.')->middleware('auth')->group(function (){
    Route::get('/calendar/month/{date?}', [CalendarController::class, 'index'] )->name('index');
});

Route::name('dailyCalendar.')->middleware('auth')->group(function (){
    Route::get('/calendar/day/{date?}', [DailyCalendarController::class, 'index'] )->name('index');
});

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

