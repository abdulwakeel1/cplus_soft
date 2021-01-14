<?php

use Illuminate\Support\Facades\Route;
// use App\Controllers\SocialGithubController;

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
Route::get('/auth/github', [App\Http\Controllers\SocialGithubController::class, 'redirectToGithub']);
Route::get('/callback/github', [App\Http\Controllers\SocialGithubController::class, 'handleCallback']);

// Route::get('auth/github', [SocialGithubController::class, 'redirectToGithub']);
// Route::get('callback/github', [SocialGithubController::class, 'handleCallback']);



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/seller-dashboard', function () {
    return view('seller-dashboard');
});

require __DIR__.'/auth.php';
