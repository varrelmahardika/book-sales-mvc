<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;

// ===== Publik =====
Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('genres', GenreController::class)->only(['index', 'show']);
Route::apiResource('authors', AuthorController::class)->only(['index', 'show']);

Route::get('/books', [BookController::class, 'index']);

// ===== Harus login =====
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

// ===== Admin: genre dan author (create, update, destroy) =====
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::apiResource('genres', GenreController::class)->except(['index', 'show']);
    Route::apiResource('authors', AuthorController::class)->except(['index', 'show']);
});

// ===== Transaksi: CUSTOMER (create, update, show) =====
Route::middleware(['auth:sanctum', 'customer'])->group(function () {
    Route::apiResource('transactions', TransactionController::class)
        ->only(['store', 'update', 'show']);
});

// ===== Transaksi: ADMIN (read all, destroy) =====
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::apiResource('transactions', TransactionController::class)
        ->only(['index', 'destroy']);
});