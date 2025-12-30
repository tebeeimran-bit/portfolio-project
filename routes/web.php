<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EducationController as AdminEducationController;
use App\Http\Controllers\Admin\ExperienceController as AdminExperienceController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/about/download-cv', [AboutController::class, 'downloadCV'])->name('about.download-cv');


// Admin routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('projects', AdminProjectController::class);
    Route::resource('experiences', AdminExperienceController::class); // Kept AdminExperienceController as per original, assuming the snippet was a typo or incomplete
    Route::resource('education', AdminEducationController::class);   // Kept AdminEducationController as per original, assuming the snippet was a typo or incomplete
    Route::resource('technologies', TechnologyController::class); // Added this line
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::patch('/messages/{message}/read', [MessageController::class, 'markAsRead'])->name('messages.read');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');
    Route::post('/settings/upload-cv', [SettingsController::class, 'uploadCV'])->name('settings.upload-cv');
    Route::post('/settings/upload-photo', [SettingsController::class, 'uploadPhoto'])->name('settings.upload-photo'); 
    
    // Visitor Logs
    Route::get('/visitors', [\App\Http\Controllers\Admin\VisitorController::class, 'index'])->name('visitors.index');
});

// Breeze auth routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
