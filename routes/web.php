<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\chatController;

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
    return view('welcome');
});

Route::get('/ChatView', [chatController::class,'loadChatView']);
Route::post('/broadcast-message', [chatController::class,'broadcast_message'])->name('broadcast_message');
