@extends('layouts.app')
@section('content')
    
    <div class="container-fluid">
        <div class="my-3">
            <h3 class="mb-0">Department</h3>
            <span class="text-muted">Update Department</span>
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
                        <a href="{{route('admin.list.of.department.page')}}" class="lead mb-0 text-dark">
                            Back
                            <i class="bi bi-arrow-return-left"></i>
                        </a>
                        <form action="{{route('admin.update.department.post', $dept->dept_id)}}" method="POST">
                            @csrf()
                            @method('PUT')
                            <div class="my-3">
                                <label class="form-label">Department Name</label>
                                <input type="text" class="form-control shadow-none" value="{{$dept->dept_name}}" name="department_name" placeholder="Department Name">
                                @error('department_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label class="form-label">Department Description</label>
                                <textarea name="department_description" class="form-control shadow-none" placeholder="Department Description" cols="30" rows="10">{{$dept->dept_description}}</textarea>
                            </div>
                            <div class="my-3 text-end">
                                <button class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection