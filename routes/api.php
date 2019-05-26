<?php

use Illuminate\Http\Request;
use App\Http\Controllers\CommentController;

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

Route::get('comments', [CommentController::class, 'index'])->name('comments.index');
Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
