<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Livewire\FileManager;
use App\Http\Livewire\Login;
use Illuminate\Support\Facades\Response;
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

Route::get('/login', Login::class)->middleware('guest')->name('login');

Route::middleware('auth')->group(function(){
    Route::get('/home', function(){
        return redirect(route('file-manager'));
    })->name('dashboard');

    Route::post('/file', [FileController::class, 'open'])->name('file.open');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

    Route::get('/', FileManager::class)->name('file-manager');
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('setting', [SettingController::class, 'update'])->name('setting.update');
});
