<?php

use App\Http\Controllers\Api\CalendyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/calendly-webhook/v9dfa7tSLSwa79mkalchdyqi/events', [CalendyController::class, 'calendlyWebhook'])->middleware('log.route');
Route::post('/calendly-webhook/v9dfa7tSLSwa79mkalchdyqi/auth', [CalendyController::class, 'calendlyWebhook']);
