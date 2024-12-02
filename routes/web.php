<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\CompanyController;

Route::post('/companies/request', [CompanyController::class, 'companyRequests'])->name('companies.request');

Route::get('/', [LayoutController::class, 'welcome']);
