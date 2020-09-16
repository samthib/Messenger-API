<?php

use Illuminate\Support\Facades\Route;

use App\Topicality;

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

Route::get('/', function () {
  return view('api');
})->name('home');

Route::get('/site', function () {
  $topics = App\Topicality::orderBy('id', 'desc')->paginate(10);
  return view('site', [
    'topics' => $topics
  ]);
})->name('site');

Route::get('/about', function() {
  return view('about');
})->name('about');

Auth::routes();
