<?php

use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\InvestorLeadController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public marketing site
Route::view('/', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/investment-sectors', 'pages.sectors')->name('sectors');
Route::view('/how-it-works', 'pages.how-it-works')->name('how-it-works');
Route::view('/faq', 'pages.faq')->name('faq');
Route::view('/privacy-policy', 'pages.privacy')->name('privacy');
Route::view('/terms-of-use', 'pages.terms')->name('terms');
Route::view('/risk-disclosure', 'pages.risk-disclosure')->name('risk-disclosure');
Route::view('/investor-eligibility', 'pages.eligibility')->name('eligibility');

Route::get('/contact', [ContactMessageController::class, 'create'])->name('contact');
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');

Route::get('/investor-registration', [InvestorLeadController::class, 'create'])->name('register-interest');
Route::post('/investor-registration', [InvestorLeadController::class, 'store'])->name('register-interest.store');

// Investor portal (authenticated)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
