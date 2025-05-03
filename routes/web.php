<?php

use App\Http\Controllers\categories\categoryController;
use App\Http\Controllers\Homes\homeCotroller;
use App\Http\Controllers\products\productController;
use App\Http\Controllers\Profiles\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('DataProject')->name('DataProject.')->group(function () {

    Route::prefix('home')->name('home.')->controller(homeCotroller::class)->group(function () {

        Route::get('/home', 'home')->name('home');
    });

    Route::prefix('products')->name('product.')->controller(productController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::post('/add', 'add')->name('add');
        Route::get('/create', 'create')->name('create');
        Route::delete('/delete/{id}', 'delete')->name('delete');
    });
    Route::prefix('profiles')->name('profiles.')->controller(ProfileController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::post('/add', 'add')->name('add');
        Route::get('/create', 'create')->name('create');
        Route::delete('/delete/{id}', 'delete')->name('delete');
    });

    Route::prefix('categories')->name('category.')->controller(categoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::post('/add', 'add')->name('add');
        Route::get('/create', 'create')->name('create');
        Route::delete('/delete/{id}', 'delete')->name('delete');
    });
});
