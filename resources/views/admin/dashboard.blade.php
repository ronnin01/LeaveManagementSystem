@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="my-3">
            <h3 class="mb-0">Dashboard</h3>
            <span class="text-muted">Home</span>
        </div>
        <div class="gy-2 row">
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="card shadow" style="border-left: 4px solid black;">
                    <div class="card-body d-flex justify-content-around align-items-center">
                        <div class="text-center">
                            <p class="lead mb-0">Total Pending Leaves</p>
                            <h2 class="mb-0">{{count($pending)}}</h2>
                        </div>
                        <i class="bi bi-question-octagon-fill display-2 mb-0 text-warning"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="card shadow" style="border-left: 4px solid black;">
                    <div class="card-body d-flex justify-content-around align-items-center">
                        <div class="text-center">
                            <p class="lead mb-0">Total Declined Leaves</p>
                            <h2 class="mb-0">{{count($declined)}}</h2>
                        </div>
                        <i class="bi bi-x-octagon-fill display-2 mb-0 text-danger"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="card shadow" style="border-left: 4px solid black;">
                    <div class="card-body d-flex justify-content-around align-items-center">
                        <div class="text-center">
                            <p class="lead mb-0">Total Approved Leaves</p>
                            <h2 class="mb-0">{{count($approved)}}</h2>
                        </div>
                        <i class="bi bi-check-circle-fill display-2 mb-0 text-success"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="card shadow" style="border-left: 4px solid black;">
                    <div class="card-body d-flex justify-content-around align-items-center">
                        <div class="text-center">
                            <p class="lead mb-0">Total Employees</p>
                            <h2 class="mb-0">{{count($employee)}}</h2>
                        </div>
                        <i class="bi bi-people-fill display-2 mb-0 text-primary"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="card shadow" style="border-left: 4px solid black;">
                    <div class="card-body d-flex justify-content-around align-items-center">
                        <div class="text-center">
                            <p class="lead mb-0">Total Department</p>
                            <h2 class="mb-0">{{count($department)}}</h2>
                        </div>
                        <i class="bi bi-alarm-fill display-2 mb-0 text-secondary"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="card shadow" style="border-left: 4px solid black;">
                    <div class="card-body d-flex justify-content-around align-items-center">
                        <div class="text-center">
                            <p class="lead mb-0">Total Leaves</p>
                            <h2 class="mb-0">{{count($leave)}}</h2>
                        </div>
                        <i class="bi bi-stopwatch-fill display-2 mb-0 text-secondary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-3">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow" style="border-top: 4px solid black;">
                        <div class="card-body">
                            <div class="my-3">
                                <p class="lead mb-0">Pending Leaves</p>
                            </div>
                            @if(Session::has('message'))
                                <div class="my-2">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{Session::get('message')}}
                                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                            <div class="my-3 table-responsive">
                                <table class="table table-borderless" id="admin-employee-leave-pending">
                                    <thead class="border-bottom">
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Employee ID</th>
                                            <th>Employee Picture</th>
                                            <th>Employee Fullname</th>
                                            <th>Employee Department</th>
                                            <th>Employee Leave Type</th>
                                            <th>Employee Leave Message</th>
                                            <th>Employee Leave Start Date</th>
                                            <th>Employee Leave End Date</th>
                                            <th>Employee Leave Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pending_leaves as $pl)
                                            <tr class="text-center">
                                                <td>{{$count++}}</td>
                                                <td>{{$pl->u_id}}</td>
                                                <td>
                                                    <img src="{{asset('storage/images/'.$pl->u_image)}}" alt="" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                                                </td>
                                                <td>
                                                    {{$pl->fullname}}
                                                </td>
                                                <td>{{$pl->dept_name}}</td>
                                                <td>{{$pl->leave_name}}</td>
                                                <td>{{$pl->ld_message}}</td>
                                                <td>{{$pl->ld_start_date}}</td>
                                                <td>{{$pl->ld_end_date}}</td>
                                                <td class="text-warning">{{$pl->ld_status}}</td>
                                                <td style="display: flex; justify-content: center;">
                                                    <form action="{{route('admin.decline.employee.leave.post')}}" method="POST" class="mx-1">
                                                        @csrf()
                                                        @method('POST')
                                                        <input type="hidden" name="ld_id" value="{{$pl->ld_id}}">
                                                        <input type="hidden" name="el_id" value="{{$pl->el_id}}">
                                                        <input type="hidden" name="ld_total_days" value="{{$pl->ld_total_days}}">
                                                        <input type="hidden" name="u_id" value="{{$pl->u_id}}">
                                                        <button class="btn btn-sm btn-danger">Decline</button>
                                                    </form>
                                                    <form action="{{route('admin.approve.employee.leave.post')}}" method="POST" class="mx-1">
                                                        @csrf()
                                                        @method('POST')
                                                        <input type="hidden" name="ld_id" value="{{$pl->ld_id}}">
                                                        <button class="btn btn-sm btn-success">Approve</button>
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
    </div>
@endsection