<div class="sidebar bg-white border-end">
    <div class="py-3 text-center border-bottom">
        @if(Auth::check())
            @if(Auth::user()->u_type == "Admin")
                <a href="" class="h4 mb-0 text-decoration-none">Admin Panel</a>
            @else
                <a href="" class="h4 mb-0 text-decoration-none">Employee Panel</a>
            @endif
        @endif
    </div>
    <div class="my-3">
        <div class="menu">
            @if(Auth::check())
                @if(Auth::user()->u_type == "Admin")
                    <div class="link my-4 px-4">
                        <a href="{{route('admin.dashboard.page')}}" class="text-decoration-none text-dark">
                            <span>
                                <i class="bi bi-grid-1x2-fill text-muted"></i>
                                Dashboard
                            </span>
                        </a>
                    </div>
                    <div class="link my-4 px-4">
                        <a class="text-decoration-none d-flex justify-content-between text-dark sub-btn">
                            <span>
                                <i class="bi bi-building-fill text-muted"></i>
                                Departments
                            </span>
                            <i class="bi bi-chevron-right down-arrow p-0 text-muted"></i>
                        </a>
                        <div class="sub-menu bg-light py-3">
                            <a href="{{route('admin.add.department.page')}}" class="ms-3 text-dark text-decoration-none sub-item">
                                <i class="bi bi-building-fill-add text-muted"></i>
                                Add Department
                            </a>
                            <br>
                            <div class="my-3"></div>
                            <a href="{{route('admin.list.of.department.page')}}" class="ms-3 text-dark text-decoration-none sub-item">
                                <i class="bi bi-clipboard2-fill text-muted"></i>
                                Department List
                            </a>
                        </div>
                    </div>
                    <div class="link my-4 px-4">
                        <a class="text-decoration-none d-flex justify-content-between text-dark sub-btn">
                            <span>
                                <i class="bi bi-clipboard-check-fill text-muted"></i>
                                Leaves
                            </span>
                            <i class="bi bi-chevron-right down-arrow p-0 text-muted"></i>
                        </a>
                        <div class="sub-menu bg-light py-3">
                            <a href="{{route('admin.add.leaves.page')}}" class="ms-3 text-dark text-decoration-none sub-item">
                                <i class="bi bi-clipboard2-plus-fill text-muted"></i>
                                Add Leave
                            </a>
                            <br>
                            <div class="my-3"></div>
                            <a href="{{route('admin.list.of.leaves.page')}}" class="ms-3 text-dark text-decoration-none sub-item">
                                <i class="bi bi-clipboard2-fill text-muted"></i>
                                Leave List
                            </a>
                        </div>
                    </div>
                    <div class="link my-4 px-4">
                        <a class="text-decoration-none d-flex justify-content-between text-dark sub-btn">
                            <span>
                                <i class="bi bi-people-fill text-muted"></i>
                                Employees
                            </span>
                            <i class="bi bi-chevron-right down-arrow p-0 text-muted"></i>
                        </a>
                        <div class="sub-menu bg-light py-3">
                            <a href="{{route('admin.add.employee.page')}}" class="ms-3 text-dark text-decoration-none sub-item">
                                <i class="bi bi-person-fill-add text-muted"></i>
                                Add Employee
                            </a>
                            <br>
                            <div class="my-3"></div>
                            <a href="{{route('admin.list.of.employee.page')}}" class="ms-3 text-dark text-decoration-none sub-item">
                                <i class="bi bi-clipboard2-fill text-muted"></i>
                                Employee List
                            </a>
                            <br>
                            <div class="my-3"></div>
                            <a href="{{route('admin.list.of.employee.leave.page')}}" class="ms-3 text-dark text-decoration-none sub-item">
                                <i class="bi bi-clipboard2-fill text-muted"></i>
                                Employee Leave List
                            </a>
                        </div>
                    </div>
                    <div class="link my-4 px-4">
                        <a href="" class="text-decoration-none text-dark">
                            <span>
                                <i class="bi bi-grid-1x2-fill text-muted"></i>
                                Reports
                            </span>
                        </a>
                    </div>
                @else
                    <div class="link my-4 px-4">
                        <a href="{{route('employee.dashboard.page')}}" class="text-decoration-none text-dark">
                            <span>
                                <i class="bi bi-grid-1x2-fill text-muted"></i>
                                Dashboard
                            </span>
                        </a>
                    </div>
                    <div class="link my-4 px-4">
                        <a class="text-decoration-none d-flex justify-content-between text-dark sub-btn">
                            <span>
                                <i class="bi bi-clipboard-check-fill text-muted"></i>
                                Leaves
                            </span>
                            <i class="bi bi-chevron-right down-arrow p-0 text-muted"></i>
                        </a>
                        <div class="sub-menu bg-light py-3">
                            <a href="{{route('employee.file.leave.page')}}" class="ms-3 text-dark text-decoration-none sub-item">
                                <i class="bi bi-clipboard2-plus-fill text-muted"></i>
                                File Leave
                            </a>
                            <br>
                            <div class="my-3"></div>
                            <a href="{{route('admin.list.of.leaves.page')}}" class="ms-3 text-dark text-decoration-none sub-item">
                                <i class="bi bi-clipboard2-fill text-muted"></i>
                                My Leave List
                            </a>
                        </div>
                    </div>
                    <div class="link my-4 px-4">
                        <a href="{{route('employee.dashboard.page')}}" class="text-decoration-none text-dark">
                            <span>
                                <i class="bi bi-gear-fill text-muted"></i>
                                Settings
                            </span>
                        </a>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>