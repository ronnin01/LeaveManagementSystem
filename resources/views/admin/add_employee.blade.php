@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="my-3">
            <h3 class="mb-0">Employee</h3>
            <span class="text-muted">Add Employee</span>
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
                        <form action="{{route('admin.add.employee.post')}}" method="POST" enctype="multipart/form-data">
                            @csrf()
                            @method('POST')
                            <div class="my-3 d-flex justify-content-center">
                                <div class="image-profile">
                                    <img src="{{asset('default.webp')}}" alt="" id="output">
                                    <input class="form-control" name="profile_image" type="file" id="formFile" accept="image/*" onchange="loadFile(event)">
                                    <i class="bi bi-camera-fill camera"></i>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-12 col-xl-6">
                                    <label class="form-label">Firstname</label>
                                    <input type="text" class="form-control shadow-none" value="{{old('firstname')}}" name="firstname" placeholder="Firstname">
                                </div>
                                <div class="col-md-12 col-xl-6">
                                    <label class="form-label">Lastname</label>
                                    <input type="text" class="form-control shadow-none" value="{{old('lastname')}}" name="lastname" placeholder="Lastname">
                                </div>
                                <div class="col-md-12 col-xl-6">
                                    <label class="form-label">Age</label>
                                    <input type="number" class="form-control shadow-none" value="{{old('age')}}" name="age" placeholder="Age">
                                </div>
                                <div class="col-md-12 col-xl-6">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control shadow-none" value="{{old('address')}}" name="address" placeholder="Address">
                                </div>
                                <div class="col-md-12 col-xl-6">
                                    <label class="form-label">Contact Number</label>
                                    <input type="text" class="form-control shadow-none" value="{{old('contact_number')}}" name="contact_number" placeholder="Contact Number">
                                </div>
                                <div class="col-md-12 col-xl-6">
                                    <label class="form-label">Department</label>
                                    <select name="department" id="" class="form-select shadow-none">
                                        <option disabled selected>Select Department</option>
                                        @foreach($department as $dept)
                                            <option value="{{$dept->dept_id}}">{{$dept->dept_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 col-xl-6">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control shadow-none" value="{{old('username')}}" name="username" placeholder="Username">
                                </div>
                                <div class="col-md-12 col-xl-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control shadow-none" value="{{old('email')}}" name="email" placeholder="Email">
                                </div>
                                <div class="col-md-12 col-xl-6">
                                    <label class="form-label">Password</label>
                                    <input type="text" class="form-control shadow-none" value="{{old('password')}}" name="password" placeholder="Password">
                                </div><div class="col-md-12 col-xl-6">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="text" class="form-control shadow-none" value="{{old('confirm_password')}}" name="confirm_password" placeholder="Confirm Password">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">User Type</label>
                                    <select name="user_type" id="" class="form-select shadow-none">
                                        <option disabled selected>Select User Type</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Employee">Employee</option>
                                    </select>
                                </div>
                                <div class="my-3 text-end">
                                    <button class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection