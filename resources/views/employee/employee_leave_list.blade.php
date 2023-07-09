@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="my-3">
            <h3 class="mb-0">Leave</h3>
            <span class="text-muted">Employee List Leave</span>
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
                            @elseif(Session::has('error'))
                                <div class="alert alert-danger border-0 alert-dismissible fade show" role="alert">
                                    {{Session::get('error')}}
                                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                        <div class="my-2">
                            <div class="my-2">
                                <label class="form-label">Select Type</label>
                                <select name="" id="employee-select-pending" class="form-select shadow-none">
                                    <option value="All">Select Type</option>
                                    @foreach($filter as $index=>$fil)
                                        @if(Request::get('type') == $fil)
                                            <option value="{{$fil}}" selected>{{$fil}}</option>
                                        @else
                                            <option value="{{$fil}}">{{$fil}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="my-2 table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Leave Name</th>
                                            <th>Leave Start Date</th>
                                            <th>Leave End Date</th>
                                            <th>Leave Total Day(s)</th>
                                            <th>Leave Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($employeeLeave as $el)
                                            <tr class="text-center">
                                                <td>{{$count++}}</td>
                                                <td>{{$el->leave_name}}</td>
                                                <td>{{$el->ld_start_date}}</td>
                                                <td>{{$el->ld_end_date}}</td>
                                                <td>{{(date('d', strtotime($el->ld_end_date)) - date('d', strtotime($el->ld_start_date)))}}</td>
                                                @if($el->ld_status == "Pending")
                                                    <td><span class="bg-warning p-1 rounded-1">{{$el->ld_status}}</span></td>
                                                @elseif($el->ld_status == "Approved")
                                                    <td><span class="bg-success p-1 rounded-1">{{$el->ld_status}}</span></td>
                                                @elseif($el->ld_status == "Declined")
                                                    <td><span class="bg-danger p-1 rounded-1">{{$el->ld_status}}</span></td>
                                                @endif
                                                <td class="d-flex justify-content-center">
                                                    <a href="" class="h4 mx-1 mb-0 text-decoration-none text-warning">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <form action="" method="POST">
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
    </div>
@endsection