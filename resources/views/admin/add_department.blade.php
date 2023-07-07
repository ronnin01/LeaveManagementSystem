@extends('layouts.app')
@section('content')
    
    <div class="container-fluid">
        <div class="my-3">
            <h3 class="mb-0">Department</h3>
            <span class="text-muted">Add Department</span>
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
                        <form action="{{route('admin.add.department.post')}}" method="POST">
                            @csrf()
                            @method('POST')
                            <div class="my-3">
                                <label class="form-label">Department Name</label>
                                <input type="text" class="form-control shadow-none" value="{{old('department_name')}}" name="department_name" placeholder="Department Name">
                                @error('department_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label class="form-label">Department Description</label>
                                <textarea name="department_description" class="form-control shadow-none" placeholder="Department Description" cols="30" rows="10">{{old('department_description')}}</textarea>
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