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
        $count = 1;
        return view('admin.dashboard')
        ->with('count', $count)
        ->with("department", Department::all())
        ->with('leave', Leaves::all())
        ->with('employee', User::whereNot('dept_id', 1)->get())
        ->with('pending_leaves', DB::table('leave_details')->select('*', DB::raw("CONCAT(users.u_firstname, ' ', users.u_lastname) as fullname"))->leftJoin('users', 'users.id', 'leave_details.u_id')->leftJoin('departments', 'departments.dept_id', 'users.dept_id')->join('employee_leaves', 'employee_leaves.el_id', 'leave_details.el_id')->join('leaves', 'leaves.leave_id', 'employee_leaves.leave_id')->where('leave_details.ld_status', "Pending")->orderBy('leave_details.ld_id', 'DESC')->get())
        ->with('pending', LeaveDetails::where('ld_status', 'Pending')->get())
        ->with('approved', LeaveDetails::where('ld_status', 'Approved')->get())
        ->with('declined', LeaveDetails::where('ld_status', 'Declined')->get());
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
        $count = 1;
        return view('employee.dashboard')
        ->with('pending', LeaveDetails::where('ld_status', "Pending")->where('u_id', auth()->user()->id)->get())
        ->with('declined', LeaveDetails::where('ld_status', "Declined")->where('u_id', auth()->user()->id)->get())
        ->with('approved', LeaveDetails::where('ld_status', "Approved")->where('u_id', auth()->user()->id)->get())
        ->with('ld_data', DB::table('leave_details')->select(['leave_details.ld_message', 'leave_details.ld_start_date', 'leave_details.ld_end_date', 'leave_details.ld_total_days', 'leave_details.ld_status', 'leaves.leave_name'])->leftJoin('employee_leaves', 'employee_leaves.el_id', 'leave_details.el_id')->join('leaves', 'leaves.leave_id', 'employee_leaves.leave_id')->where('leave_details.u_id', auth()->user()->id)->orderBy('leave_details.ld_id', 'DESC')->get())
        ->with('count', $count);

        // return response()->json([
        //     'data' => User::with('leave_details')->where('users.id', auth()->user()->id)->get()
        // ]);
    }

    // employee file leave page
    public function employeeFileLeavePage(){
        return view('employee.file_leave')
        ->with('leaves', DB::table('employee_leaves')->select("*")->where('employee_leaves.u_id', auth()->user()->id)->leftJoin('leaves', 'leaves.leave_id', 'employee_leaves.leave_id')->get())
        ->with('total', DB::table('employee_leaves')->select(DB::raw('SUM(employee_leaves.el_total) AS total_sum'))->where('employee_leaves.u_id', auth()->user()->id)->get());
    }

    // employee list of leave page
    public function employeeListOfLeavePage(Request $request){
        $filter = array(
            "Pending",
            "Approved",
            "Declined"
        );
        $count = 1;
        $employeeLeave = LeaveDetails::select("*")
                         ->join('users', 'users.id', 'leave_details.u_id')
                         ->join('employee_leaves', "employee_leaves.el_id", 'leave_details.el_id')
                         ->join('leaves', 'leaves.leave_id', 'employee_leaves.leave_id')
                         ->where('leave_details.u_id', auth()->user()->id)
                         ->get();

        if($request->get('type')){
            $employeeLeave = LeaveDetails::select("*")
                            ->join('users', 'users.id', 'leave_details.u_id')
                            ->join('employee_leaves', "employee_leaves.el_id", 'leave_details.el_id')
                            ->join('leaves', 'leaves.leave_id', 'employee_leaves.leave_id')
                            ->where('leave_details.u_id', auth()->user()->id)
                            ->where('leave_details.ld_status', $request->get('type'))
                            ->get();
        }

        return view('employee.employee_leave_list')
                ->with('count', $count)
                ->with('filter', $filter)
                ->with('employeeLeave', $employeeLeave);
    }
}
