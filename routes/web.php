<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreadsController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\HomeController;

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



Auth::routes();
//Route::resource('threads', ThreadsController::class);
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('threads', [ThreadsController::class, 'index'])->name('all_threads');
Route::get('threads/create', [ThreadsController::class, 'create']);
Route::post('threads', [ThreadsController::class, 'store'])->name('threads.store');
Route::get('threads/{channel}/{thread}', [ThreadsController::class, 'show']);
Route::post('/threads/{channel}/{thread}/replies', [RepliesController::class, 'store'])->name('add_reply_to_thread');


//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
