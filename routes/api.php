<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\VoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

    Route::post('/register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);
    Route::post('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
    Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->middleware('auth:sanctum');

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/albums', [AlbumController::class, 'index']);
        Route::post('/albums', [AlbumController::class, 'store']);
        Route::delete('/albums/{album}', [AlbumController::class, 'destroy']);
        Route::post('/albums/{album}/vote', [VoteController::class, 'vote']);
    });

    
