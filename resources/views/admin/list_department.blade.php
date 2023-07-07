@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="my-3">
            <h3 class="mb-0">Department</h3>
            <span class="text-muted">List of Department</span>
        </div>
        <div class="my-3 row">
            <div class="col">
                <div class="card shadow"  style="border-top: 4px solid black;">
                    <div class="card-body table-responsive">
                        <div class="my-2">
                            @if(Session::has('message'))
                                <div class="alert alert-success border-0 alert-dismissible fade show" role="alert">
                                    {{Session::get('message')}}
                                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                        <table class="table table-borderless">
                            <thead class="border-bottom">
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Department Name</th>
                                    <th>Department Description</th>
                                    <th>Department Created</th>
                                    <th>Department Updated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($department as $dept)
                                    <tr class="text-center">
                                        <td>{{$count++}}</td>
                                        <td>{{$dept->dept_name}}</td>
                                        <td>{{$dept->dept_description}}</td>
                                        <td>{{$dept->created_at}}</td>
                                        <td>{{$dept->updated_at}}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{route('admin.update.department.page', $dept->dept_id)}}" class="h4 mx-1 mb-0 text-decoration-none text-warning">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{route('admin.delete.department.post', $dept->dept_id)}}" method="POST">
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

@endsection