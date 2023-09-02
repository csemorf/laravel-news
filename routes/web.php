<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
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
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('blog', BlogController::class)->middleware('auth.check');

Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::get('login', [AdminController::class, 'index'])->name('login.index');
    Route::post('login', [AdminController::class, 'login'])->name('login');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('admin');
    // admin.dashboard
});





require __DIR__ . '/auth.php';