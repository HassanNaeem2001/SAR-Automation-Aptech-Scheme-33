<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
Route::get('/add_teacher',[StaffController::class,('addteacherform')]);
Route::get('/staff_timings', function () {
    return view('add_teacher_timings');
});
Route::post('/ins_stf_timings',[StaffController::class,('StaffTimings')])->name('insert_staff_timings');