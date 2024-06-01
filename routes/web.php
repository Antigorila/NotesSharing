<?php

use Illuminate\Support\Facades\Auth;
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
    if (Auth::check())
    {
        return view('home');
    }
    else
    {
        return view('welcome');
    }
});

Route::get('/welcome', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('notes', App\Http\Controllers\NoteController::class);
Route::resource('friends', App\Http\Controllers\FriendController::class);
Route::resource('friend_requests', App\Http\Controllers\FriendRequestController::class);
Route::resource('join_requests', App\Http\Controllers\JoinRequestController::class);

Route::post('/accept', [App\Http\Controllers\JoinRequestController::class, 'accept']);
Route::get('/notes/inspect/{user}', [App\Http\Controllers\NoteController::class, 'inspect'])->name('notes.inspect');

