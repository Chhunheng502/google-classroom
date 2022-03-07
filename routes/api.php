<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\ClassroomController;
use App\Http\Controllers\Api\ThemeUploadController;
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

Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('api.google.login');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('api.google.callback');

Route::name('api.classrooms.')->group(function() {

    Route::get('classrooms', [ClassroomController::class, 'index'])->name('index');
    Route::post('classrooms', [ClassroomController::class, 'store'])->name('store');
    Route::put('classrooms/{classroom}', [ClassroomController::class, 'update'])->name('update');
    Route::delete('classrooms/{classroom}', [ClassroomController::class, 'destroy'])->name('destroy');

    Route::put('classrooms/{classroom}/theme', [ThemeUploadController::class, 'update'])->name('theme.update');

});