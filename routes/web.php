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
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminFaqCategoryController;
use App\Http\Controllers\Admin\AdminFaqItemController;
use App\Http\Controllers\Admin\AdminContactController;

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

   //likes op nieuws
    Route::post('/news/{news}/like', [NewsController::class, 'toggleLike'])
        ->name('news.like');
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

        //admin news
        Route::get('/news', [AdminNewsController::class, 'index'])->name('news.index');
        Route::get('/news/create', [AdminNewsController::class, 'create'])->name('news.create');
        Route::post('/news', [AdminNewsController::class, 'store'])->name('news.store');

        Route::get('/news/{news}/edit', [AdminNewsController::class, 'edit'])->name('news.edit');
        Route::put('/news/{news}', [AdminNewsController::class, 'update'])->name('news.update');

        Route::delete('/news/{news}', [AdminNewsController::class, 'destroy'])->name('news.destroy');

        // FAQ categorieën
        Route::get('/faq-categories', [AdminFaqCategoryController::class, 'index'])->name('faq.categories.index');
        Route::get('/faq-categories/create', [AdminFaqCategoryController::class, 'create'])->name('faq.categories.create');
        Route::post('/faq-categories', [AdminFaqCategoryController::class, 'store'])->name('faq.categories.store');
        Route::get('/faq-categories/{category}/edit', [AdminFaqCategoryController::class, 'edit'])->name('faq.categories.edit');
        Route::put('/faq-categories/{category}', [AdminFaqCategoryController::class, 'update'])->name('faq.categories.update');
        Route::delete('/faq-categories/{category}', [AdminFaqCategoryController::class, 'destroy'])->name('faq.categories.destroy');

// FAQ items (vragen)
        Route::get('/faq-items/create', [AdminFaqItemController::class, 'create'])->name('faq.items.create');
        Route::post('/faq-items', [AdminFaqItemController::class, 'store'])->name('faq.items.store');
        Route::get('/faq-items/{item}/edit', [AdminFaqItemController::class, 'edit'])->name('faq.items.edit');
        Route::put('/faq-items/{item}', [AdminFaqItemController::class, 'update'])->name('faq.items.update');
        Route::delete('/faq-items/{item}', [AdminFaqItemController::class, 'destroy'])->name('faq.items.destroy');


        //admin contact inbox

        Route::get('/contact', [AdminContactController::class, 'index'])
            ->name('contact.index');

        Route::get('/contact/{contactMessage}', [AdminContactController::class, 'show'])
            ->name('contact.show');

        Route::delete('/contact/{contactMessage}', [AdminContactController::class, 'destroy'])
            ->name('contact.destroy');
    });
