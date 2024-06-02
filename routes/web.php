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
Route::resource('users', App\Http\Controllers\UserController::class);

Route::get('/notes/inspect/{user}', [App\Http\Controllers\NoteController::class, 'inspect'])->name('notes.inspect');

Route::post('/friend_requests/accept/{friendRequest}', [App\Http\Controllers\FriendRequestController::class, 'accept'])->name('friend_requests.accept');
Route::post('/friend_requests/decline/{friendRequest}', [App\Http\Controllers\FriendRequestController::class, 'decline'])->name('friend_requests.decline');

Route::post('/join_requests/accept/{joinRequest}', [App\Http\Controllers\JoinRequestController::class, 'accept'])->name('join_requests.accept');
Route::post('/join_requests/decline/{joinRequest}', [App\Http\Controllers\JoinRequestController::class, 'decline'])->name('join_requests.decline');