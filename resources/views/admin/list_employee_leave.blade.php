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
                        <div class="my-2 table-responsive">
                            <table class="table table-borderless" id="list-employees-leaves-table">
                                <thead>
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Employee ID</th>
                                        <th>Employee Profile</th>
                                        <th>Employee FullName</th>
                                        <th>Employee Department</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employeeLeaves as $el)
                                        <tr class="text-center">
                                            <td>{{$count++}}</td>
                                            <td>{{$el->u_id}}</td>
                                            <td>
                                                <img src="{{asset('storage/images/'.$el->u_image)}}" alt="" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                                            </td>
                                            <td>{{$el->fullname}}</td>
                                            <td>{{$el->dept_name}}</td>
                                            <td>
                                                <a href="{{route('admin.view.employee.leave.page', $el->u_id)}}" class="h4 mx-1 mb-0 text-decoration-none text-dark">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
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