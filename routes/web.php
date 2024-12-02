<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LayoutController;
use Illuminate\Support\Facades\Route;

Route::post('/companies/request', [CompanyController::class, 'companyRequests'])->name('companies.request');

Route::get('/', [LayoutController::class,'welcome']);
