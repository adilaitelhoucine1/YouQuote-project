<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hello', function (Request $request) {
    return response()->json(['message'=>'tbnksnis ']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', [QuoteController::class, 'index']);
    Route::get('/quotes/random/{count}', [QuoteController::class, 'random']);
    Route::get('/quotes/GetQuoteWithLength/{length}', [QuoteController::class, 'GetQuoteWithLength']);
    Route::get('/Popular', [QuoteController::class, 'GetPopularQuote']);
    Route::apiResource('quotes', QuoteController::class)->except(['update', 'destroy', 'store']);
    Route::post('/quotes', [QuoteController::class, 'store']);
    Route::put('/quotes/{quote}', [QuoteController::class, 'update'])->middleware('can:update,quote');
    Route::delete('/quotes/{quote}', [QuoteController::class, 'destroy'])->middleware('can:delete,quote');
    Route::post('/quotes/like/{quote}', [QuoteController::class, 'Like']);
});

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::apiResource("quotes", QuoteController::class)->except(['index','store', 'update', 'destroy']);
    Route::apiResource("tags", TagController::class);
    Route::apiResource("categories", CategoryController::class);
    Route::put('/quotes/approved/{quote}', [QuoteController::class, 'Approved']);
    Route::put('/quotes/rejected/{quote}', [QuoteController::class,  'Rejected']);
});
