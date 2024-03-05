<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MylayoutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create']);
    
});

Route::group(['prefix' => 'layout'], function () {
    Route::get('/admin', [MylayoutController::class, 'index']);
    Route::get('/user', [MylayoutController::class, 'index2']);
});

Route::group(['prefix' => 'layout'], function () {
    Route::get('/admin', [MylayoutController::class, 'index']);
    Route::get('/user', [MylayoutController::class, 'index2']);
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/admin', [MylayoutController::class, 'index']);
    Route::get('/user', [MylayoutController::class, 'index2']);
    Route::get('/user/list', [MylayoutController::class, 'list']);
    Route::get('/user/delete/{id}', [MylayoutController::class, 'delete']);
    Route::get('/searchByKeyword', [MylayoutController::class, 'searchByKeyword']);
    Route::get('/user/edit/{id}', [MylayoutController::class, 'edit']);
    Route::get('/news/add', [NewsController::class, 'add']);
    Route::get('/widgets/widgets', [MylayoutController::class, 'widgets']);
});
require __DIR__.'/auth.php';
