<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\ClassroomController;
use App\Http\Controllers\Api\Classwork\ClassworkController;
use App\Http\Controllers\Api\Classwork\MaterialController;
use App\Http\Controllers\Api\Classwork\Task\AssignmentController;
use App\Http\Controllers\Api\Classwork\Task\MCQController;
use App\Http\Controllers\Api\Classwork\Task\QuizController;
use App\Http\Controllers\Api\Classwork\Task\SAQController;
use App\Http\Controllers\Api\RegistrationController;
use App\Http\Controllers\Api\StreamController;
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

/* TODO
 *
 * _Update new tests
 * _Create new policies for classworks
 * _Organize folders and files (ex: create sub folder)
 *  
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('api.google.login');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('api.google.callback');

Route::middleware('auth:sanctum')->group(function() {

    Route::name('api.registrations.')->group(function() {
        
        Route::get('registrations', [RegistrationController::class, 'index'])->name('index');
        Route::post('registrations', [RegistrationController::class, 'store'])->name('store');
    });

    Route::name('api.classrooms.')->group(function() {
        
        Route::get('classrooms', [ClassroomController::class, 'index'])->name('index');
        Route::post('classrooms', [ClassroomController::class, 'store'])->name('store');
        Route::get('classrooms/{classroom}', [ClassroomController::class, 'show'])->name('show');
        Route::put('classrooms/{classroom}', [ClassroomController::class, 'update'])->name('update')->can('update', 'classroom');
        Route::delete('classrooms/{classroom}', [ClassroomController::class, 'destroy'])->name('destroy')->can('delete', 'classroom');
    
        Route::put('classrooms/{classroom}/theme', [ThemeUploadController::class, 'update'])->name('theme.update');
    });


    Route::get('cl/{classroom_id}/all', [ClassworkController::class, 'index']);

    Route::post('materials', [MaterialController::class, 'store']);
    Route::post('assignments', [AssignmentController::class, 'store']);
    Route::post('quizzes', [QuizController::class, 'store']);
    Route::post('short-answer-questions', [SAQController::class, 'store']);
    Route::post('multiple-choices-questions', [MCQController::class, 'store']);
});

Route::get('u/{user_identifier}/st/{classroom_slug}', [StreamController::class, 'show']);

Route::get('u/{user_identifier}/cl/{classroom_slug}/all', [ClassworkController::class, 'index']);
Route::get('u/{user_identifier}/cl/{classroom_slug}/{topic_slug}', [ClassworkController::class, 'show']);

Route::post('u/{user_identifier}/cl/{classroom_slug}/m', [MaterialController::class, 'store']);
Route::get('u/{user_identifier}/cl/{classroom_slug}/m/{material_slug}', [MaterialController::class, 'show']);

Route::get('u/{user_identifier}/cl/{classroom_slug}/a/{assignment_slug}', [AssignmentController::class, 'show']);
Route::get('u/{user_identifier}/cl/{classroom_slug}/q/{quiz_slug}', [QuizController::class, 'show']);
Route::get('u/{user_identifier}/cl/{classroom_slug}/sa/{saq_slug}', [SAQController::class, 'show']);
Route::get('u/{user_identifier}/cl/{classroom_slug}/mc/{mcq_slug}', [MCQController::class, 'show']);