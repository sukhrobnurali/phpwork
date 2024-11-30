<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::post('/companies/request', [CompanyController::class, 'companyRequests'])->name('companies.request');

Route::get('/', [LayoutController::class,'welcome']);
