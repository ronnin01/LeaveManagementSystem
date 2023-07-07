@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="my-3">
            <h3 class="mb-0">Leave</h3>
            <span class="text-muted">File a Leave</span>
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
                        <div class="my-3">
                            <div class="my-2 table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Leave Name</th>
                                            <th>Leave Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($leaves as $leave)
                                            <tr class="text-center">
                                                <td>{{$leave->leave_name}}</td>
                                                <td>{{$leave->leave_total}}</td>
                                            </tr>
                                        @endforeach
                                        <tr class="text-center">
                                            <td colspan="2"><strong>Total Leave: </strong>{{$total[0]->total_sum}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="my-2">
                                <form action="{{route('employee.file.leave.post')}}" method="POST">
                                    @csrf()
                                    @method("POST")
                                    <div class="row">
                                        <div class="col-12 my-2">
                                            <label class="form-label">Select Leave</label>
                                            <select name="leave" id="" class="form-select shadow-none">
                                                <option value="" selected disabled>Select Leave</option>
                                                @foreach($leaves as $leave)
                                                    <option value="{{$leave->leave_id}}">{{$leave->leave_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('leave')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 col-xl-6 my-2">
                                            <label class="form-label">Start Date</label>
                                            <input type="date" name="start_date" class="form-control shadow-none" id="">
                                            @error('start_date')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 col-xl-6 my-2">
                                            <label class="form-label">End Date</label>
                                            <input type="date" name="end_date" class="form-control shadow-none" id="">
                                            @error('end_date')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="my-2">
                                        <label class="form-label">Reason</label>
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="reason"></textarea>
                                            <label for="floatingTextarea2">Comments</label>
                                        </div>
                                        @error('reason')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="my-3 text-end">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection