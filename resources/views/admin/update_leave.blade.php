@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="my-3">
            <h3 class="mb-0">Leaves</h3>
            <span class="text-muted">Update Leaves</span>
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
                        <a href="{{route('admin.list.of.leaves.page')}}" class="lead mb-0 text-dark">
                            Back
                            <i class="bi bi-arrow-return-left"></i>
                        </a>
                        <form action="{{route('admin.update.leaves.post', $leaves->leave_id)}}" method="POST">
                            @csrf()
                            @method('PUT')
                            <div class="row my-3">
                                <div class="col-sm-12 col-xl-6">
                                    <label class="form-label">Leave Name</label>
                                    <input type="text" class="form-control shadow-none" value="{{$leaves->leave_name}}" name="leave_name" placeholder="Leave Name">
                                    @error('leave_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-xl-6">
                                    <label class="form-label">Leave Total</label>
                                    <input type="number" class="form-control shadow-none" value="{{$leaves->leave_total}}" name="leave_total" placeholder="Leave Total">
                                    @error('leave_total')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="my-3">
                                <label class="form-label">Leave Description</label>
                                <textarea name="leave_description" class="form-control shadow-none" placeholder="Leave Description" cols="30" rows="10">{{$leaves->leave_description}}</textarea>
                            </div>
                            <div class="my-3 text-end">
                                <button class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection