<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HHomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\MissionController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\HeroStatController;
use App\Http\Controllers\Admin\InboxController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\ShowRoomController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Auth\ChangePasswordController;


// Front-End Routes
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index']);

Route::get('/hey', [HHomeController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('admin.dashboard');

Route::get('/contact', [InboxController::class, 'index'])->name('contact.index');
Route::post('/contact', [InboxController::class, 'store'])->name('contact.store');

// Admin routes (for inbox)


//Admin Dashboard Routes (Protected by middleware)
Route::group(['prefix' => 'users', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard'); 

    // Other admin routes
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('permissions', PermissionsController::class);
        Route::resource('roles', RolesController::class);
        Route::resource('users', UsersController::class);
        Route::resource('sections', SectionController::class);
        Route::resource('heroes', HeroController::class);
        Route::resource('hero_stats', HeroStatController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('testimonials', TestimonialController::class);
        Route::resource('abouts', AboutController::class);
        Route::resource('showrooms', ShowRoomController::class);
      
        Route::resource('missions', MissionController::class);
        Route::resource('pricing', PricingController::class);
        Route::resource('contacts', ContactController::class);
        Route::resource('password', ChangePasswordController::class);

         // Inbox Route
    Route::get('inbox', [InboxController::class, 'inbox'])->name('admin.inbox');
    });
});
