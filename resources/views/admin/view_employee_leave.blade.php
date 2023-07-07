@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="my-3">
            <h3 class="mb-0">Employee</h3>
            <span class="text-muted">View Employee Leave</span>
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
                        <a href="{{route('admin.list.of.employee.leave.page')}}" class="lead mb-0 text-dark">
                            Back
                            <i class="bi bi-arrow-return-left"></i>
                        </a>
                        <div class="my-2">
                        <div class="row g-3 justify-content-center">
                                <div class="col-md-12 col-xl-3 text-center">
                                    <img src="{{asset('storage/images/'.$employeeLeave[0]->u_image)}}" class="img-thumbnail" alt="" style="width: 300px; height: 300px; object-fit: cover;">
                                </div>
                                <div class="col-md-12 col-xl-8">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th class="text-center" style="width: 150px;">ID</th>
                                                <th class="text-center">{{$employeeLeave[0]->u_id}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center" style="width: 150px;">Fullname</th>
                                                <th class="text-center">{{$employeeLeave[0]->fullname}}</th>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <th class="text-center" style="width: 150px;">Department</th>
                                                <th class="text-center">{{$employeeLeave[0]->dept_name}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center" style="width: 150px;">Type</th>
                                                <th class="text-center">{{$employeeLeave[0]->u_type}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center" style="width: 150px;">Time Created</th>
                                                <th class="text-center">{{\Carbon\Carbon::parse($employeeLeave[0]->created_at)->diffForhumans()}}</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>Leave ID</th>
                                                <th>Leave Name</th>
                                                <th>Leave Employee Total</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($employeeLeave as $el)
                                                <tr class="text-center">
                                                    <td>{{$count++}}</td>
                                                    <td>{{$el->leave_id}}</td>
                                                    <td>{{$el->leave_name}}</td>
                                                    <form action="{{route('admin.update.employee.leave.total.post', $el->el_id)}}" method="POST">
                                                        @csrf()
                                                        @method('PUT')
                                                        <td style="width: 200px;">
                                                            <input type="number" class="form-control shadow-none" min="0" max="{{$el->leave_total}}" name="total_leave" value="{{$el->el_total}}">
                                                        </td>
                                                        <td>
                                                            <button type="submit" class="btn btn-sm btn-success shadow-none"><i class="bi bi-pencil-square me-2"></i>Update</button>
                                                        </td>
                                                    </form>
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
        </div>
    </div>

@endsection