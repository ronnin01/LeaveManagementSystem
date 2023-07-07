@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="my-3">
            <h3 class="mb-0">Employee</h3>
            <span class="text-muted">List of Employee</span>
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
                        <div class="my-2 table-responsive">
                            <table class="table table-borderless" id="list-employees-table" style="width:100%">
                                <thead class="border-bottom-2">
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Profile Image</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Age</th>
                                        <th>Address</th>
                                        <th>Contact Number</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Department</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                        <tr class="text-center">
                                            <td>{{$count++}}</td>
                                            <td>
                                                <img src="{{asset('storage/images/'.$employee->u_image)}}" alt="" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                                            </td>
                                            <td>{{$employee->u_firstname}}</td>
                                            <td>{{$employee->u_lastname}}</td>
                                            <td>{{$employee->u_age}}</td>
                                            <td>{{$employee->u_address}}</td>
                                            <td>{{$employee->u_contact_number}}</td>
                                            <td>{{$employee->u_email}}</td>
                                            <td>{{$employee->u_username}}</td>
                                            <td>{{$employee->u_password}}</td>
                                            <td>{{$employee->dept_name}}</td>
                                            <td class="d-flex justify-content-center align-items-center">
                                                <a href="{{route('admin.view.employee.page', $employee->id)}}" class="h4 mx-1 mb-0 text-decoration-none text-dark">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                                <a href="{{route('admin.update.employee.page', $employee->id)}}" class="h4 mx-1 mb-0 text-decoration-none text-warning">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <form action="{{route('admin.delete.employee.post', $employee->id)}}" method="POST">
                                                    @csrf()
                                                    @method('DELETE')
                                                    <button type="submit" class="h4 mx-1 mb-0 text-decoration-none text-danger border-0 bg-transparent">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection