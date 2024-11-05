<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
// Route::get('/',function(){
// return View('')
// });
Route::get('/',[StaffController::class,('addteacherform')])->name('AddTeacher');
Route::get('/staff_timings', function () {
    return view('add_teacher_timings');
})->name('StaffTimings');
Route::post('/ins_stf_timings',[StaffController::class,('StaffTimings')])->name('insert_staff_timings');
Route::post('/ins_teacher',[StaffController::class,('InsertTeacher')])->name('InsertTeacher');
Route::get('/add_batch',[StaffController::class,('GetBatchForm')])->name('AddBatches');
Route::get('/ins_batch',[StaffController::class,('InsertBatch')])->name('InsertBatch');
Route::get('/add_cf',function(){
return view('add_course');
})->name('AddCF');
Route::post('/ins_cf',[StaffController::class,('insert_cf')])->name('InsertCF');
Route::post('/add_batch',[StaffController::class,('insert_batch')])->name('AddBatch');
Route::get('/get_teachers',[StaffController::class,('get_teachers')])->name('ViewTeachers');
Route::post('/DeleteTeacher',[StaffController::class,('deleteteacher')]);
Route::get('/get_batches',[StaffController::class,('getbatches')])->name('ViewBatches');
Route::post('/DeleteBatch',[StaffController::class,('deletebatch')]);