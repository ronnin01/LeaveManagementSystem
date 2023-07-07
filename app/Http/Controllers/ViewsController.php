<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\EmployeeLeaves;
use App\Models\LeaveDetails;
use App\Models\Leaves;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewsController extends Controller
{
    // signin page
    public function signInPage(){
        return view('signin');
    }

    // admin dashboard page
    public function adminDashboardPage(){
        return view('admin.dashboard')
        ->with("department", Department::all())
        ->with('leave', Leaves::all())
        ->with('employee', User::whereNot('dept_id', 1)->get());
    }

    // admin add department page
    public function adminAddDepartmentPage(){
        return view('admin.add_department');
    }

    // admin list of department page
    public function adminListOfDepartmentPage(){
        $count = 1;
        return view('admin.list_department')
        ->with("department", Department::all())
        ->with('count', $count);
    }

    // admin update department page
    public function adminUpdateDepartmentPage($id){
        return view('admin.update_department')
        ->with('dept', Department::where('dept_id', $id)->first());
    }

    // admin add leaves page
    public function adminAddLeavesPage(){
        return view('admin.add_leave');
    }

    // admin list of leaves page
    public function adminListOfLeavesPage(){
        $count = 1;
        return view('admin.list_leave')
        ->with('leaves', Leaves::all())
        ->with('count', $count);
    }

    // admin update leaves page
    public function adminUpdateLeavesPage($id){
        return view('admin.update_leave')
        ->with('leaves', Leaves::where('leave_id', $id)->first());
    }

    // admin add employee page
    public function adminAddEmployeePage(){
        return view('admin.add_employee')
        ->with('department', Department::all());
    }

    // admin list of employee page
    public function adminListOfEmployeePage(){
        $count = 1;
        return view('admin.list_employee')
        ->with('employees', DB::table('users')->leftJoin('departments', 'departments.dept_id', 'users.dept_id')->orderBy('id', 'desc')->get())
        ->with('count', $count);
    }

    // admin view employee page
    public function adminViewEmployeePage($id){
        return view('admin.view_employee')
        ->with('employee', DB::table('users')->where('id', $id)->leftJoin('departments', 'departments.dept_id', 'users.dept_id')->first());
    }

    // admin update employee page
    public function adminUpdateEmployeePage($id){
        return view('admin.update_employee')
        ->with('employee', DB::table('users')->where('id', $id)->leftJoin('departments', 'departments.dept_id', 'users.dept_id')->first())
        ->with('department', Department::all());
    }

    // admin list of employee leave page
    public function adminListOfEmployeeLeavePage(){
        $count = 1;
        return view('admin.list_employee_leave')
        ->with('count', $count)
        ->with('employeeLeaves', 
                DB::table('employee_leaves')
                ->join('users', 'users.id', 'employee_leaves.u_id')
                ->join('departments', 'departments.dept_id', 'users.dept_id')
                ->select('*', DB::raw('CONCAT(users.u_firstname, " ", users.u_lastname) AS fullname'))
                ->groupBy('employee_leaves.u_id')
                ->get());
    }

    // admin view employee leave page
    public function adminViewEmployeeLeavePage($id){
        $count = 1;
        return view('admin.view_employee_leave')
        ->with('employeeLeave',
                DB::table('employee_leaves')
                ->select('*', DB::raw('CONCAT(users.u_firstname, " ", users.u_lastname) AS fullname'))
                ->where('u_id', $id)
                ->leftJoin('users', 'users.id', 'employee_leaves.u_id')
                ->leftJoin('departments', 'departments.dept_id', 'users.dept_id')
                ->leftJoin('leaves', 'leaves.leave_id', 'employee_leaves.leave_id')
                ->get())
        ->with('count', $count);
    }

    // employee dashboard page
    public function employeeDashboardPage(){
        return view('employee.dashboard')
        ->with('pending', LeaveDetails::where('ld_status', "Pending")->get())
        ->with('declined', LeaveDetails::where('ld_status', "Declined")->get())
        ->with('approved', LeaveDetails::where('ld_status', "Approved")->get());
    }

    // employee file leave page
    public function employeeFileLeavePage(){
        return view('employee.file_leave')
        ->with('leaves', DB::table('employee_leaves')->select("*")->where('employee_leaves.u_id', auth()->user()->id)->leftJoin('leaves', 'leaves.leave_id', 'employee_leaves.leave_id')->get())
        ->with('total', DB::table('employee_leaves')->select(DB::raw('SUM(employee_leaves.el_total) AS total_sum'))->where('employee_leaves.u_id', auth()->user()->id)->get());
    }
}
