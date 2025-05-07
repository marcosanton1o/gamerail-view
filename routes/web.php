<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GameCategoriesController;
use App\Http\Controllers\ProdCategoriesController;

//Rota da home
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Rotas de games
Route::get('/games', [GameController::class,'index'])->name('games.index');
Route::get('/games/create', [GameController::class,'create'])->name('games.create');
Route::post('/games', [GameController::class,'store'])->name('games.store');
Route::get('/games/edit/{game}', [GameController::class,'edit'])->name('games.edit');
Route::put('/games/update/{game}', [GameController::class,'update'])->name('games.update');
Route::delete('/games/destroy/{game}', [GameController::class,'destroy'])->name('games.destroy');

//Rotas de companies
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
Route::get('/companies/edit/{company}', [CompanyController::class, 'edit'])->name('companies.edit');
Route::put('/companies/update/{company}', [CompanyController::class, 'update'])->name('companies.update');
Route::delete('/companies/destroy/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');

//Rotas de products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/update/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/destroy/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

//Rotas de prod_categories
Route::get('/prodCategories', [ProdCategoriesController::class, 'index'])->name('prodCategories.index');
Route::get('/prodCategories/create', [ProdCategoriesController::class, 'create'])->name('prodCategories.create');
Route::post('/prodCategories', [ProdCategoriesController::class, 'store'])->name('prodCategories.store');
Route::get('/prodCategories/edit/{prodCategory}', [ProdCategoriesController::class, 'edit'])->name('prodCategories.edit');
Route::put('/prodCategories/update/{prodCategory}', [ProdCategoriesController::class, 'update'])->name('prodCategories.update');
Route::delete('/prodCategories/destroy/{prodCategory}', [ProdCategoriesController::class, 'destroy'])->name('prodCategories.destroy');

//Rotas de game_categories
Route::get('/gameCategories', [GameCategoriesController::class, 'index'])->name('gameCategories.index');
Route::get('/gameCategories/create', [GameCategoriesController::class, 'create'])->name('gameCategories.create');
Route::post('/gameCategories', [GameCategoriesController::class, 'store'])->name('gameCategories.store');
Route::get('/gameCategories/edit/{gameCategory}', [GameCategoriesController::class, 'edit'])->name('gameCategories.edit');
Route::put('/gameCategories/update/{gameCategory}', [GameCategoriesController::class, 'update'])->name('gameCategories.update');
Route::delete('/gameCategories/destroy/{gameCategory}', [GameCategoriesController::class, 'destroy'])->name('gameCategories.destroy');

//essa middleware tem q colocar em todas as rotas para impedir que alguem q nao esteja logado acesse
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
