@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="my-3">
            <h3 class="mb-0">Employee</h3>
            <span class="text-muted">Update Employee</span>
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
                        <form action="{{route('admin.update.employee.post', $employee->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf()
                            @method('PUT')
                            <div class="my-3 d-flex justify-content-center">
                                <div class="image-profile">
                                    <img src="{{asset('storage/images/'.$employee->u_image)}}" alt="" id="output">
                                    <input class="form-control" name="profile_image" type="file" id="formFile" accept="image/*" onchange="loadFile(event)">
                                    <i class="bi bi-camera-fill camera"></i>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-12 col-xl-6">
                                    <label class="form-label">Firstname</label>
                                    <input type="text" class="form-control shadow-none" value="{{$employee->u_firstname}}" name="firstname" placeholder="Firstname">
                                    @error('firstname')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-xl-6">
                                    <label class="form-label">Lastname</label>
                                    <input type="text" class="form-control shadow-none" value="{{$employee->u_lastname}}" name="lastname" placeholder="Lastname">
                                    @error('lastname')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-xl-6">
                                    <label class="form-label">Age</label>
                                    <input type="number" class="form-control shadow-none" value="{{$employee->u_age}}" name="age" placeholder="Age">
                                    @error('age')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-xl-6">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control shadow-none" value="{{$employee->u_address}}" name="address" placeholder="Address">
                                    @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-xl-6">
                                    <label class="form-label">Contact Number</label>
                                    <input type="text" class="form-control shadow-none" value="{{$employee->u_contact_number}}" name="contact_number" placeholder="Contact Number">
                                    @error('contact_number')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-xl-6">
                                    <label class="form-label">Department</label>
                                    <select name="department" id="" class="form-select shadow-none">
                                        <option disabled>Select Department</option>
                                        @foreach($department as $dept)
                                            @if($dept->dept_id == $employee->dept_id)
                                                <option value="{{$dept->dept_id}}" selected>{{$dept->dept_name}}</option>
                                            @else
                                                <option value="{{$dept->dept_id}}">{{$dept->dept_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('department')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-xl-6">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control shadow-none" value="{{$employee->u_username}}" name="username" placeholder="Username">
                                    @error('username')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-xl-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control shadow-none" value="{{$employee->u_email}}" name="email" placeholder="Email">
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-xl-6">
                                    <label class="form-label">Password</label>
                                    <input type="text" class="form-control shadow-none" value="{{$employee->u_password}}" name="password" placeholder="Password">
                                    @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-xl-6">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="text" class="form-control shadow-none" value="{{$employee->u_password}}" name="confirm_password" placeholder="Confirm Password">
                                    @error('confirm_password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
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