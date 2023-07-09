<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ViewsController;
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

Route::get('/', [ViewsController::class, "signInPage"])->name('signin.page');
Route::post('/signin', [PostController::class, 'signInPost'])->name('signin.post');

// admin pages
Route::group(['prefix'=>'admin'], function(){
    Route::get('/dashboard', [ViewsController::class, 'adminDashboardPage'])->name('admin.dashboard.page');
    Route::get('/add/department', [ViewsController::class, 'adminAddDepartmentPage'])->name('admin.add.department.page');
    Route::post('/add/department', [PostController::class, 'adminAddDepartmentPost'])->name('admin.add.department.post');
    Route::get('/list/department', [ViewsController::class, 'adminListOfDepartmentPage'])->name('admin.list.of.department.page');
    Route::delete('/list/deparment/{id}', [PostController::class, 'adminDeleteDepartmentPost'])->name('admin.delete.department.post');
    Route::get('/update/department/{id}', [ViewsController::class, 'adminUpdateDepartmentPage'])->name('admin.update.department.page');
    Route::put('/update/department/{id}', [PostController::class, 'adminUpdateDepartmentPost'])->name('admin.update.department.post');
    Route::get('/add/leave', [ViewsController::class, 'adminAddLeavesPage'])->name('admin.add.leaves.page');
    Route::post('/add/leave', [PostController::class, 'adminAddLeavesPost'])->name('admin.add.leaves.post');
    Route::get('list/leave', [ViewsController::class, 'adminListOfLeavesPage'])->name('admin.list.of.leaves.page');
    Route::delete('list/leave/{id}', [PostController::class, 'adminDeleteLeavesPost'])->name('admin.delete.leaves.post');
    Route::get('update/leave/{id}', [ViewsController::class, 'adminUpdateLeavesPage'])->name('admin.update.leaves.page');
    Route::put('update/leave/{id}', [PostController::class, 'adminUpdateLeavesPost'])->name('admin.update.leaves.post');
    Route::get('add/employee', [ViewsController::class, 'adminAddEmployeePage'])->name('admin.add.employee.page');
    Route::post('add/employee', [PostController::class, 'adminAddEmployeePost'])->name('admin.add.employee.post');
    Route::get('list/employee', [ViewsController::class, 'adminListOfEmployeePage'])->name('admin.list.of.employee.page');
    Route::get('list/employee/{id}', [ViewsController::class, 'adminViewEmployeePage'])->name('admin.view.employee.page');
    Route::get('list/employee/update/{id}', [ViewsController::class, 'adminUpdateEmployeePage'])->name('admin.update.employee.page');
    Route::put('list/employee/update/{id}', [PostController::class, 'adminUpdateEmployeePost'])->name('admin.update.employee.post');
    Route::delete('list/employee/delete/{id}', [PostController::class, 'adminDeleteEmployeePost'])->name('admin.delete.employee.post');
    Route::get('list/leave/employee', [ViewsController::class, 'adminListOfEmployeeLeavePage'])->name('admin.list.of.employee.leave.page');
    Route::get('list/leave/employee/view/{id}', [ViewsController::class, 'adminViewEmployeeLeavePage'])->name('admin.view.employee.leave.page');
    Route::put('update/employee/leave/total/{id}', [PostController::class, 'adminUpdateEmployeeLeaveTotalPost'])->name('admin.update.employee.leave.total.post');
});

Route::group(["prefix"=>"employee"], function(){
    Route::get('dashboard', [ViewsController::class, 'employeeDashboardPage'])->name('employee.dashboard.page');
    Route::get('leave/file', [ViewsController::class, 'employeeFileLeavePage'])->name('employee.file.leave.page');
    Route::post('leave/file/post', [PostController::class, 'employeeFileLeavePost'])->name('employee.file.leave.post');
    Route::get('list/leave', [ViewsController::class, 'employeeListOfLeavePage'])->name('employee.list.of.leave.page');
});
