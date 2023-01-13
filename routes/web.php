<?php

use Illuminate\Support\Facades\Auth;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes([
    'verify' => true,
    'reset' => true,
    'confirm' => false
]);

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::get('/', function () {
        return redirect(route('home'));
    });

    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['middleware' => ['verified']], function () {
        Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
        Route::patch('profile/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update')->where('id', '[0-9]+');

        Route::post('categories/search', [App\Http\Controllers\CategoryController::class, 'search'])->name('categories.search');
        Route::resource('categories', App\Http\Controllers\CategoryController::class, ['except' => 'show']);

        Route::resource('passwords', App\Http\Controllers\PasswordController::class, ['except' => 'show']);
        Route::post('passwords/search', [App\Http\Controllers\PasswordController::class, 'search'])->name('passwords.search');
        Route::get('passwords/validate/{id}', [App\Http\Controllers\PasswordController::class, 'showValidate'])->name('passwords.validate')->where('id', '[0-9]+');
        Route::post('passwords/validate/', [App\Http\Controllers\PasswordController::class, 'verifyPassword'])->name('passwords.validation');
    });
});

Route::fallback(function () {
    return view('fallback');
});
