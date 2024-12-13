<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;

Route::post('/users/login', [ApiAuthController::class, 'login'])->name('users.login');

Route::get('/employers', [EmployerController::class, 'listAll'])->name('employers.listAll');
Route::post('/employers', [EmployerController::class, 'addEmployer'])->name('employers.addEmployer')->middleware('auth:api');
Route::get('/employers/{employerId}/jobs', [JobController::class, 'listAllByEmployerId'])->name('employers.jobs.listAllByEmployerId');
Route::post('/employers/{employerId}/jobs', [JobController::class, 'addJob'])->name('employers.jobs.addJob')->middleware('auth:api');
