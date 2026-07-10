<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

Route::get('/', [QuestionController::class, 'index']);
Route::get('/responder', [QuestionController::class, 'studentForm']);
Route::post('/responder', [QuestionController::class, 'submitStudentForm']);
Route::delete('/submissions/{id}', [QuestionController::class, 'destroySubmission']);
