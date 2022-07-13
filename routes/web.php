<?php

use App\Http\Controllers\GradeController;
use App\Http\Controllers\SectionController;

use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TestController;
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

Route::get('/', function () {
    return view('dashboard');
});
Route::resource('grade',GradeController::class);
Route::resource('section',SectionController::class);
 Route::resource('Teachers',TeacherController::class);
 Route::resource('tests',TestController::class);

