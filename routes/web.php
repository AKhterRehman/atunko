<?php

use App\Http\Controllers\Admin\ApplicationReviewController;
use App\Http\Controllers\Admin\AuditLogController as AdminAuditLogController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DocumentReviewController;
use App\Http\Controllers\Admin\InvestorController as AdminInvestorController;
use App\Http\Controllers\Admin\KycController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingsController as AdminSettingsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\Investor\ApplicationController;
use App\Http\Controllers\Investor\DashboardController;
use App\Http\Controllers\Investor\DocumentController;
use App\Http\Controllers\Investor\NotificationController;
use App\Http\Controllers\Investor\PreferenceController;
use App\Http\Controllers\Investor\ProfileOnboardingController;
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
Route::post('/contact', [ContactMessageController::class, 'store'])->middleware('throttle:5,1')->name('contact.store');

Route::get('/investor-registration', [InvestorLeadController::class, 'create'])->name('register-interest');
Route::post('/investor-registration', [InvestorLeadController::class, 'store'])->middleware('throttle:5,1')->name('register-interest.store');

// Investor portal (authenticated)
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'role:investor'])->prefix('investor')->name('investor.')->group(function () {
    Route::get('/profile', [ProfileOnboardingController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileOnboardingController::class, 'update'])->name('profile.update');

    Route::get('/preferences', [PreferenceController::class, 'edit'])->name('preferences.edit');
    Route::put('/preferences', [PreferenceController::class, 'update'])->name('preferences.update');

    Route::get('/application', [ApplicationController::class, 'edit'])->name('application.edit');
    Route::post('/application/submit', [ApplicationController::class, 'submit'])->name('application.submit');
    Route::get('/application/status', [ApplicationController::class, 'status'])->name('status');

    Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::post('/documents', [DocumentController::class, 'store'])->middleware('throttle:10,1')->name('documents.store');
    Route::get('/documents/{document}/download', [DocumentController::class, 'download'])->name('documents.download');
    Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');

    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
});

// Admin / reviewer / compliance portal
Route::middleware(['auth', 'verified', 'role:admin,reviewer,compliance'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/investors', [AdminInvestorController::class, 'index'])->name('investors.index');
    Route::get('/investors/{investor}', [AdminInvestorController::class, 'show'])->name('investors.show');

    Route::post('/applications/{application}/assign', [ApplicationReviewController::class, 'assign'])->name('applications.assign');
    Route::post('/applications/{application}/decide', [ApplicationReviewController::class, 'decide'])->name('applications.decide');

    Route::get('/documents/{document}/download', [DocumentReviewController::class, 'download'])->name('documents.download');
    Route::put('/documents/{document}', [DocumentReviewController::class, 'update'])->name('documents.update');

    Route::put('/kyc-checks/{kycCheck}', [KycController::class, 'update'])->name('kyc-checks.update');

    Route::get('/audit-log', [AdminAuditLogController::class, 'index'])->name('audit-log.index');

    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/export/applications', [ReportController::class, 'exportApplications'])->name('reports.export.applications');

    Route::middleware('role:admin')->group(function () {
        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');

        Route::get('/settings', [AdminSettingsController::class, 'index'])->name('settings.index');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
