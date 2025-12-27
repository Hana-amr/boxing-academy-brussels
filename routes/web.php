<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminPriceController;

//Route::get('/', function () {
  //  return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Publieke pagina's

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

Route::get('/prices', [PriceController::class, 'index'])->name('prices.index');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
require __DIR__.'/auth.php';

//user
Route::get('/users/{user}', [UserController::class, 'show'])
    ->name('users.show');

//admin
Route::get('/profiles', [UserProfileController::class, 'index'])
    ->name('profiles.index');

Route::get('/profiles/{user}', [UserProfileController::class, 'show'])
    ->name('profiles.show');


Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('users.index');

        Route::patch('/users/{user}/toggle-admin', [AdminUserController::class, 'toggleAdmin'])
            ->name('users.toggleAdmin');

        Route::get('/users/create', [AdminUserController::class, 'create'])
            ->name('users.create');

        Route::post('/users', [AdminUserController::class, 'store'])
            ->name('users.store');

        Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])
            ->name('users.destroy');

        //admin prices
        Route::get('/prices', [AdminPriceController::class, 'index'])
            ->name('prices.index');

        Route::get('/prices/create', [AdminPriceController::class, 'create'])
            ->name('prices.create');

        Route::post('/prices', [AdminPriceController::class, 'store'])
            ->name('prices.store');

        Route::get('/prices/{price}/edit', [AdminPriceController::class, 'edit'])
            ->name('prices.edit');

        Route::put('/prices/{price}', [AdminPriceController::class, 'update'])
            ->name('prices.update');

        Route::delete('/prices/{price}', [AdminPriceController::class, 'destroy'])
            ->name('prices.destroy');
    });
