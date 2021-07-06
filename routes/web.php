<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontrol;
use App\Http\Controllers\Studentcontrol;
use App\Http\Controllers\Branchcontrol;

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

Route::get('/dashbord', [Admincontrol::class, 'index']);
Route::get('loginpage', [Admincontrol::class, 'adminlogin']);//1st parameter is url, 2nd is file name in views folder
Route::post('islogin', [Admincontrol::class, 'adminloged']);

Route::get('studentregisterform', [Studentcontrol::class, 'create']);
Route::post('studentstore', [Studentcontrol::class, 'store']);
Route::get('studentdetails', [Studentcontrol::class, 'show']);
Route::get('/student_edit/{id}', [Studentcontrol::class, 'edit'])->name('student.edit');
Route::post('/student_update/{id}', [Studentcontrol::class, 'update'])->name('student.update');
Route::get('/student_delete/{id}',[Studentcontrol::class, 'destroy'])->name('student.delete');
Route::get('addbranch', [Branchcontrol::class, 'create']);
Route::post('branchstore', [Branchcontrol::class, 'store']);