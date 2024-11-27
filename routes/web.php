<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::post('/companies/request', [CompanyController::class, 'companyRequests'])->name('companies.request');

Route::get('/', function () {
    $categories = Category::all();
    return view('welcome',compact('categories'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('companies', CompanyController::class);
    Route::get('/inactive-companies', [CompanyController::class, 'inactive'])->name('companies.inactive');
    Route::put('/companies/{company}/activate', [CompanyController::class, 'activate'])->name('companies.activate');
});

require __DIR__ . '/auth.php';
