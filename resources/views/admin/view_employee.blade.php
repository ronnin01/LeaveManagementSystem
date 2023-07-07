@extends('layouts.app')
@section('content')
    
    <div class="container-fluid">
        <div class="my-3">
            <h3 class="mb-0">Employee</h3>
            <span class="text-muted">Employee Details</span>
        </div>
        <div class="my-3 row">
            <div class="col">
                <div class="card shadow"  style="border-top: 4px solid black;">
                    <div class="card-body">
                        <div class="my-2">
                            @if(Session::has('message'))
                                <div class="alert alert-success border-0 alert-dismissible fade show" role="alert">
                                    {{Session::get('message')}}
                                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                        <a href="{{route('admin.list.of.employee.page')}}" class="lead mb-0 text-dark">
                            Back
                            <i class="bi bi-arrow-return-left"></i>
                        </a>
                        <div class="my-2">
                            <div class="row g-3 justify-content-center">
                                <div class="col-md-12 col-xl-3 text-center">
                                    <img src="{{asset('storage/images/'.$employee->u_image)}}" class="img-thumbnail" alt="" style="width: 300px; height: 300px; object-fit: cover;">
                                </div>
                                <div class="col-md-12 col-xl-8">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th class="text-center" style="width: 150px;">FirstName</th>
                                                <th class="text-center">{{$employee->u_firstname}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center" style="width: 150px;">LastName</th>
                                                <th class="text-center">{{$employee->u_lastname}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center" style="width: 150px;">Age</th>
                                                <th class="text-center">{{$employee->u_age}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center" style="width: 150px;">Address</th>
                                                <th class="text-center">{{$employee->u_address}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center" style="width: 150px;">Contact Number</th>
                                                <th class="text-center">{{$employee->u_contact_number}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center" style="width: 150px;">Email</th>
                                                <th class="text-center">{{$employee->u_email}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center" style="width: 150px;">Username</th>
                                                <th class="text-center">{{$employee->u_username}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center" style="width: 150px;">Password</th>
                                                <th class="text-center">{{$employee->u_password}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center" style="width: 150px;">Department</th>
                                                <th class="text-center">{{$employee->dept_name}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center" style="width: 150px;">Type</th>
                                                <th class="text-center">{{$employee->u_type}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center" style="width: 150px;">Time Created</th>
                                                <th class="text-center">{{\Carbon\Carbon::parse($employee->created_at)->diffForhumans()}}</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection