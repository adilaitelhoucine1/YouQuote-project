<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\AuthController;

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
    Route::apiResource("quotes", QuoteController::class);
    Route::get('/quotes/random/{count}', [QuoteController::class, 'random']);
    Route::get('/quotes/GetQuoteWithLength/{length}', [QuoteController::class, 'GetQuoteWithLength']);
    Route::get('/Popular', [QuoteController::class, 'GetPopularQuote']);
});