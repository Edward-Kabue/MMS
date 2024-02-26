<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;


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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');
//create a named route called welcome
//Named routes allow you to generate URLs 
//without being coupled to the actual URL defined in the route
// Route::get('/welcome', function () {
//     return view('welcome');
// });
// tasks routes
Route::resource('/tasks', TasksController::class);

// posts routes
//Route::get('/post',[PostController::class, 'index'])->name('postIndex');
Route::resource('post', PostController::class);


// leads routes

Route::resource('lead', LeadController::class);