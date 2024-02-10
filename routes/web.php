<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\DivelogController;
use App\Http\Controllers\DivelogLikeController;
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
      // 🔽 追加
    Route::resource('divelogs', DivelogController::class);
    Route::post('/divelogs/{divelog}/like', [DivelogLikeController::class, 'store'])->name('divelogs.like');
    Route::delete('/divelogs/{divelog}/like', [DivelogLikeController::class, 'destroy'])->name('divelogs.dislike');
});

require __DIR__.'/auth.php';
