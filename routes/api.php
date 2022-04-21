<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\ClassroomController;
use App\Http\Controllers\Api\Classwork\ClassworkController;
use App\Http\Controllers\Api\Classwork\MaterialController;
use App\Http\Controllers\Api\Classwork\Task\AssignmentController;
use App\Http\Controllers\Api\Classwork\Task\MCQController;
use App\Http\Controllers\Api\Classwork\Task\QuizController;
use App\Http\Controllers\Api\Classwork\Task\SAQController;
use App\Http\Controllers\Api\Classwork\TopicController;
use App\Http\Controllers\Api\RegistrationController;
use App\Http\Controllers\Api\StudentWorkController;
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
 * _Group similar routes together
 *  
 */

 /* NOTE
 *
 * create registration and assign "student" or "teacher" role when inviting
 * append v1 after api routes
 * create v2 for your current system
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
        Route::get('classrooms/{classroom}', [ClassroomController::class, 'show'])->name('show')->can('view', 'classroom');
        Route::put('classrooms/{classroom}', [ClassroomController::class, 'update'])->name('update')->can('update', 'classroom');
        Route::delete('classrooms/{classroom}', [ClassroomController::class, 'destroy'])->name('destroy')->can('delete', 'classroom');
    
        Route::put('classrooms/{classroom}/theme', [ThemeUploadController::class, 'update'])->name('theme.update');
    });


    Route::get('cl/{classroom}/all', [ClassworkController::class, 'index'])->can('viewAnyClasswork', 'classroom');

    Route::prefix('cl/{classroom}')->middleware('can:isAdminOrTeacher,classroom')->group(function() {

        Route::get('topics', [TopicController::class, 'index']);
        Route::post('topics', [TopicController::class, 'store']);

        Route::get('materials', [MaterialController::class, 'index']);
        Route::post('materials', [MaterialController::class, 'store']);
        Route::get('materials/{material}', [MaterialController::class, 'show']);
        Route::put('materials/{material}', [MaterialController::class, 'update']);
        Route::delete('materials/{material}', [MaterialController::class, 'destroy']);
        
        Route::get('assignments', [AssignmentController::class, 'index']);
        Route::post('assignments', [AssignmentController::class, 'store']);
        Route::get('assignments/{assignment}', [AssignmentController::class, 'show']);
        Route::put('assignments/{assignment}', [AssignmentController::class, 'update']);
        Route::delete('assignments/{assignment}', [AssignmentController::class, 'destroy']);

        Route::get('quizzes', [QuizController::class, 'index']);
        Route::post('quizzes', [QuizController::class, 'store']);
        Route::get('quizzes/{quiz}', [QuizController::class, 'show']);
        Route::put('quizzes/{quiz}', [QuizController::class, 'update']);
        Route::delete('quizzes/{quiz}', [QuizController::class, 'destroy']);
    
        Route::get('saqs', [SAQController::class, 'index']);
        Route::post('saqs', [SAQController::class, 'store']);
        Route::get('saqs/{saq}', [SAQController::class, 'show']);
        Route::put('saqs/{saq}', [SAQController::class, 'update']);
        Route::delete('saqs/{saq}', [SAQController::class, 'destroy']);
    
        Route::get('mcqs', [MCQController::class, 'index']);
        Route::post('mcqs', [MCQController::class, 'store']);
        Route::get('mcqs/{mcq}', [MCQController::class, 'show']);
        Route::put('mcqs/{mcq}', [MCQController::class, 'update']);
        Route::delete('mcqs/{mcq}', [MCQController::class, 'destroy']);

        Route::get('works', [StudentWorkController::class, 'index']);
        Route::post('u/{user}/works', [StudentWorkController::class, 'store']);
        Route::get('u/{user}/works', [StudentWorkController::class, 'show']);
    });
});

// Route::get('u/{user_identifier}/st/{classroom_slug}', [StreamController::class, 'show']);

// Route::get('u/{user_identifier}/cl/{classroom_slug}/all', [ClassworkController::class, 'index']);
// Route::get('u/{user_identifier}/cl/{classroom_slug}/{topic_slug}', [ClassworkController::class, 'show']);

// Route::post('u/{user_identifier}/cl/{classroom_slug}/m', [MaterialController::class, 'store']);
// Route::get('u/{user_identifier}/cl/{classroom_slug}/m/{material_slug}', [MaterialController::class, 'show']);

// Route::get('u/{user_identifier}/cl/{classroom_slug}/a/{assignment_slug}', [AssignmentController::class, 'show']);
// Route::get('u/{user_identifier}/cl/{classroom_slug}/q/{quiz_slug}', [QuizController::class, 'show']);
// Route::get('u/{user_identifier}/cl/{classroom_slug}/sa/{saq_slug}', [SAQController::class, 'show']);
// Route::get('u/{user_identifier}/cl/{classroom_slug}/mc/{mcq_slug}', [MCQController::class, 'show']);