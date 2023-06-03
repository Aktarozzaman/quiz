<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizquestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return  view('home');
});
 Route::get('/sign-in',[AuthController::class,'signin'])->name('signin');
Route::post('/sign-in',[AuthController::class,'post_signin'])->name('signin');
Route::get('/signup',[AuthController::class,'signup'])->name('signup');
Route::post('/sign-up',[AuthController::class,'post_signup'])->name('postsignup');

Route::post('/sign-out',[AuthController::class,'signout'])->name('signout');

Route::middleware('auth')->group(function(){
    Route::get('/home',DashboardController::class )->name('home');
});
Route::middleware('auth')->resource('categories',CategoryController::class);
Route::resource('posts',PostController::class);
Route::resource('questions',QuestionController::class);
Route::resource('options',OptionController::class);
Route::resource('quiz',QuizController::class);
Route::resource('quizquestion',QuizquestionController::class);
Route::get('/test',[UserController::class,'testQuiz'])->name('test');
Route::get('/test/user',[UserController::class,'show'])->name('test.user');
Route::post('/quiz/submit', [UserController::class, 'submit'])->name('quiz.submit');
Route::get('/user/points',[UserController::class,'points'])->name('user.points');










