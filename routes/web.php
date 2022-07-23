<?php

use App\Http\Controllers\GradeController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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
Route::resource('grade', GradeController::class);
Route::resource('section', SectionController::class);
Route::resource('Teachers', TeacherController::class);

//==============================Students============================
Route::resource('Student', StudentController::class);
Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
// Route::post('/update-admin/{id}',[AdminController::class, 'Update'])->name('update-admin');
Route::post('Upload_attachment',[StudentController::class, 'Upload_attachment'])->name('Upload_attachment');
Route::get('Download_attachment/{studentsname}/{filename}',[StudentController::class, 'Download_attachment'])->name('Download_attachment');
Route::post('Delete_attachment',[StudentController::class, 'Delete_attachment'])->name('Delete_attachment');

    //==============================Promotion Students ============================

Route::resource('Promotion',PromotionController::class);


