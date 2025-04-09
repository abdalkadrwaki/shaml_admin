<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\BroadcastMessageController;

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


    Route::middleware(['auth'])->group(function () {
        Route::resource('currencies', CurrencyController::class);
    });


    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

    Route::group(['prefix' => 'broadcast', 'as' => 'broadcast.'], function () {
        Route::get('/', [BroadcastMessageController::class, 'index'])->name('index');
        Route::get('/create', [BroadcastMessageController::class, 'create'])->name('create');
        Route::post('/', [BroadcastMessageController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [BroadcastMessageController::class, 'edit'])->name('edit');
        Route::put('/{id}', [BroadcastMessageController::class, 'update'])->name('update');
        Route::delete('/{id}', [BroadcastMessageController::class, 'destroy'])->name('destroy');
    });

});
