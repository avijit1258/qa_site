<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'QuestionController@allQuestionsWithTheirAnswerCount');
Route::post('/question', 'QuestionController@store');

Route::get('/questions/{question_id}', 'QuestionController@questionWithAnswers');
Route::post('/questions/{question_id}/answers', 'AnswerController@store');