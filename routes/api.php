<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\TestimonialController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Categories
Route::get('/categories', [CategoryController::class, 'index']);

// Newsletters
Route::get('/newsletters', [NewsletterController::class, 'index']);
Route::post('/newsletters', [NewsletterController::class, 'store']);

// Events
Route::get('/events', [EventController::class, 'index']);
Route::post('/events', [EventController::class, 'store']);

// Orders
Route::post('/orders', [OrderController::class, 'store']);

// Testimonials
Route::get('/testimonials', [TestimonialController::class, 'index']);
Route::post('/testimonials', [TestimonialController::class, 'store']);

