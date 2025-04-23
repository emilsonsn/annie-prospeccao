<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('list')->group(function () {
        Route::get('/', function () {
            return view('list');
        })->name('list');

        Route::get('/my', function () {
            return view('list');
        })->name('my.list');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])
            ->name('users');
    
        Route::get('/create', [UserController::class, 'create'])
            ->name('users.create');
    
        Route::post('/', [UserController::class, 'store'])
            ->name('users.store');
    
        Route::get('/{user}/edit', [UserController::class, 'edit'])
            ->name('users.edit');
    
        Route::put('/{user}', [UserController::class, 'update'])
            ->name('users.update');
    
        Route::patch('/{user}/block', [UserController::class, 'block'])
            ->name('users.block');
    });


    Route::prefix('setting')->group(function () {
        Route::get('/', [SettingController::class, 'edit'])->name('setting');
        Route::post('/', [SettingController::class, 'store'])->name('settings.store');
        Route::put('/{id}', [SettingController::class, 'update'])->name('settings.update');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';
