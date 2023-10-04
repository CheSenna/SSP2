<?php

use App\Http\Controllers\AdminController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/search-users', 'SearchUserController@index')->name('search-users');
Route::get('redirects','App\Http\Controllers\HomeController@index');

Route::get('/view_category', [AdminController::class, 'view_category']);
Route::post('/add_category', [AdminController::class, 'add_category']);
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);

Route::get('/view_product', [AdminController::class, 'view_product']);
Route::get('/show_product', [AdminController::class, 'show_product']);
Route::post('/add_product', [AdminController::class, 'add_product']);
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
Route::match(['get', 'post'], '/edit_product/{id}', [AdminController::class, 'edit_product']);



Route::get('/admin-dashboard', function () {
    return view('livewire.admin-dashboard');
})->name('admin-dashboard');

Route::get('/about', function () {
    return view('about'); 
})->name('about');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/index', function () {
    return view('index');
})->name('index');
