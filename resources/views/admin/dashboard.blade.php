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
                            <h2 class="mb-0">20</h2>
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
                            <h2 class="mb-0">20</h2>
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
                            <h2 class="mb-0">20</h2>
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
                            <p class="lead mb-0">Total Logged In</p>
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
                            <p class="lead mb-0">Total Logged Out</p>
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
                            <div class="my-3 table-responsive">
                                <table class="table table-borderless">
                                    <thead class="border-bottom">
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Employee Picture</th>
                                            <th>Employee Fullname</th>
                                            <th>Employee Age</th>
                                            <th>Employee Address</th>
                                            <th>Employee Contact Number</th>
                                            <th>Employee Department</th>
                                            <th>Employee Leave Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

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