<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\EmployeeLeaves;
use App\Models\LeaveDetails;
use App\Models\Leaves;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // signin post
    public function signInPost(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $user = User::where('users.u_username', $request->input('username'))->orWhere('u_email', $request->input('username'))->first();

        if($user){
            if($user->u_password == $request->input('password')){
                Auth::login($user);

                if($user->u_type == "Admin"){
                    return redirect()->route('admin.dashboard.page');
                }else{
                    return redirect()->route('employee.dashboard.page');
                }
            }else{
                return redirect()->back()->with("message", "Please Check Password")->withInput();
            }
        }else{
            return redirect()->back()->with("message", "Please Check Your Username or Email!")->withInput();
        }

    }

    // admin add department post
    public function adminAddDepartmentPost(Request $request){
        $request->validate([
            'department_name' => 'required',
        ]);

        $deptInput = $request->all();

        if(!$deptInput['department_description']){
            $deptInput['department_description'] = 'None';
        }
 
        $createDept = Department::create([
            'dept_name'=>$deptInput['department_name'],
            'dept_description'=>$deptInput['department_description']
        ]);

        if($createDept){
            return redirect()->back()->with('message', 'New Department has been added!')->withInput();
        }else{
            return redirect()->back()->with('message', 'Unable to add new Department!')->withInput();
        }
    }

    // admin delete department post
    public function adminDeleteDepartmentPost($id){
        Department::destroy($id);

        return redirect()->back()->with("message", "Department has been deleted!");
    }

    public function adminUpdateDepartmentPost(Request $request, $id){

        $request->validate([
            'department_name' => 'required'
        ]);

        $dept = Department::where('dept_id', $id)->update([
            'dept_name'=>$request->input('department_name'),
            'dept_description'=>$request->input('department_description')
        ]);

        if($dept){
            return redirect()->back()->with('message', 'Department has been updated!');
        }else{
            return redirect()->back()->with('message', 'Unable to update department!');
        }

    }

    public function adminAddLeavesPost(Request $request){
        $request->validate([
            'leave_name'=>'required',
            'leave_total'=>'required|min:1|numeric'
        ]);

        $leaveInput = $request->all();

        if(!$leaveInput["leave_description"]){
            $leaveInput["leave_description"] = "None";
        }

        $leaveCreate = Leaves::create([
            'leave_name'=>$leaveInput['leave_name'],
            'leave_total'=>$leaveInput['leave_total'],
            'leave_description'=>$leaveInput["leave_description"]
        ]);

        if($leaveCreate){
            return redirect()->back()->with('message', "New leave has been added!")->withInput();
        }else{
            return redirect()->back()->with('message', "Unable to add leave!")->withInput();
        }
    }

    // admin delete leave post
    public function adminDeleteLeavesPost($id){
        Leaves::destroy($id);

        return redirect()->back()->with("message", "Leave has been deleted!");
    }

    // admin update leave post
    public function adminUpdateLeavesPost(Request $request,$id){

        $request->validate([
            'leave_name'=>'required',
            'leave_total'=>'required|min:1|numeric'
        ]);

        $leaves = $request->all();

        if(!$leaves['leave_description']){
            !$leaves['leave_description'] = "None";
        }

        $updateLeave = Leaves::where('leave_id', $id)->update([
            'leave_name'=>$request->input('leave_name'),
            'leave_description'=>$leaves['leave_description'],
            'leave_total'=>$request->input('leave_total')
        ]);

        if($updateLeave){
            return redirect()->back()->with('message', "Leave has been updated!")->withInput();
        }else{
            return redirect()->back()->with('message', 'Unable to update leave!')->withInput();
        }

    }

    // admin add employee post
    public function adminAddEmployeePost(Request $request){

        $newUser = $request->all();
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'age'=>'required|numeric',
            'address'=>'required',
            'contact_number'=>'required|numeric',
            'department'=>'required',
            'username'=>'required|unique:users,u_username',
            'email'=>'required|unique:users,u_email',
            'password'=>'required|min:6',
            'confirm_password'=>'required_with:password|same:password'
        ]);

        if($request->hasFile('profile_image')){
            $request->file('profile_image')->storeAs("public/images", $request->file('profile_image')->getClientOriginalName());

            $newUser['profile_image'] = $request->file('profile_image')->getClientOriginalName();
        }else{
            $newUser['profile_image'] = 'DefaultProfile.jpg';
        }
 
        $created = new User();
        $created->dept_id = $newUser['department'];
        $created->u_image = $newUser['profile_image'];
        $created->u_firstname = ucwords($newUser['firstname']);
        $created->u_lastname = ucwords($newUser['lastname']);
        $created->u_age = $newUser['age'];
        $created->u_address = $newUser['address'];
        $created->u_contact_number = $newUser['contact_number'];
        $created->u_username = $newUser['username'];
        $created->u_email = $newUser['email'];
        $created->u_password = $newUser['password'];
        $created->u_type = $newUser['user_type'];
        $created->save();

        $leaves = Leaves::all();
        foreach($leaves as $leave){
            EmployeeLeaves::create([
                'u_id'=>$created->id,
                'leave_id'=>$leave->leave_id,
                'el_total'=>$leave->leave_total
            ]);
        }

        if($created){
            return redirect()->back()->with('message', "New user has been added!")->withInput();
        }else{
            return redirect()->back()->with('message', "Unable to add user!")->withInput();
        }

    }

    // admin update employee post
    public function adminUpdateEmployeePost(Request $request, $id){
        
        $update = User::where('id', $id)->first();

        $updateUser = $request->all();
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'age'=>'required|numeric',
            'address'=>'required',
            'contact_number'=>'required|numeric',
            'department'=>'required',
            'username'=>'required|unique:users,u_username,'.$id,
            'email'=>'required|unique:users,u_email,'.$id,
            'password'=>'required|min:6',
            'confirm_password'=>'required_with:password|same:password'
        ]);

        if($request->hasFile('profile_image')){
            Storage::delete($update->u_image);
            $request->file('profile_image')->storeAs("public/images", $request->file('profile_image')->getClientOriginalName());

            $updateUser['profile_image'] = $request->file('profile_image')->getClientOriginalName();
        }else{
            $updateUser['profile_image'] = $update->u_image;
        }

        $update->dept_id = $updateUser['department'];
        $update->u_image = $updateUser['profile_image'];
        $update->u_firstname = ucwords($updateUser['firstname']);
        $update->u_lastname = ucwords($updateUser['lastname']);
        $update->u_age = $updateUser['age'];
        $update->u_address = $updateUser['address'];
        $update->u_contact_number = $updateUser['contact_number'];
        $update->u_username = $updateUser['username'];
        $update->u_email = $updateUser['email'];
        $update->u_password = $updateUser['password'];
        $update->save();

        if($update){
            return redirect()->back()->with('message', "User has been updated!")->withInput();
        }else{
            return redirect()->back()->with('message', "Unable to update user!")->withInput();
        }

    }

    // admin delete employee post
    public function adminDeleteEmployeePost($id){
        User::destroy($id);
        EmployeeLeaves::where('u_id', $id)->delete();

        return redirect()->back()->with("message", "User has been deleted!");
    }

    // admin update employee leave total post
    public function adminUpdateEmployeeLeaveTotalPost(Request $request, $id){
        $employeeLeave = EmployeeLeaves::where('el_id', $id)->update([
            "el_total"=>$request->input("total_leave")
        ]);

        if($employeeLeave){
            return back()->with('message', "Employee Leave total has been updated!");
        }else{
            return back()->with('message', "Unable to update employee leave!");
        }
    }

    // employee file leave post
    public function employeeFileLeavePost(Request $request){
        $request->validate([
            'leave' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'reason' => 'required'
        ]);

        if($request->input('total_leave') < 0){
            return back()->with('error', "You don't have enough Leaves.");
        }else{

            $days = date('d', strtotime($request->input('end_date'))) - date('d', strtotime($request->input('start_date')));

            if($days < 0){
                return back()->with('error', "You cant file leave below the expected start date.");
            }else{

                $updateTotalLeave = EmployeeLeaves::where('u_id', auth()->user()->id)->where('el_id', $request->input('leave'))->update([
                    'el_total' => $days
                ]);
    
                $fileLeave = LeaveDetails::create([
                    'u_id' => auth()->user()->id,
                    'el_id' => $request->input('leave'),
                    'ld_message' => $request->input('reason'),
                    'ld_start_date' => $request->input('start_date'),
                    'ld_end_date' => $request->input('end_date'),
                    'ld_status' => 'Pending'
                ]);
    
                if($fileLeave && $updateTotalLeave){
                    return back()->with('message', "File Leave successfully. Please wait for the response.");
                }

            }

        }

    }
}
