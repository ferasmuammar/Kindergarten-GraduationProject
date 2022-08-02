<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\FeesInvoicesController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GraduatedController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProcessingFeeController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ReceiptStudentsController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::group(['middleware' => ['guest']], function () {

    Route::get('/', function () {
        return view('auth.login');
    });

});

// Route::get('/', function () {
//     return view('auth.login');
// });
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
Route::resource('Graduated',GraduatedController::class);

    //=============================Fees Students ============================

Route::resource('Fees',FeeController::class);
Route::resource('Fees_Invoices', FeesInvoicesController::class);
Route::resource('receipt_students', ReceiptStudentsController::class);
Route::resource('ProcessingFee', ProcessingFeeController::class);
Route::resource('Payment_students', PaymentController::class);

//================================Attendance ==============================
Route::resource('Attendance', AttendanceController::class);

//==============================Subjects============================

Route::resource('subjects', SubjectController::class);

//========================
Route::get('download_file/{filename}',[LibraryController::class,'downloadAttachment'])->name('downloadAttachment');
Route::resource('library', LibraryController::class);

//==============================Setting============================
Route::resource('settings', SettingController::class);




Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
