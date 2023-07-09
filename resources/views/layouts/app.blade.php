<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/sass/app.scss')
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('datatables.min.css')}}">
    <title>Document</title>
</head>
<body class="bg-light">
    
    <div class="d-flex">
        @include('components.sidebar')
        <div class="main-content">
            @include('components.navbar')
            @yield('content')
            <div class="container-fluid my-5">
                <div class="text-center">
                    <p class="mb-0 text-muted">
                        &copy; CopyRight by Aaron Gabriel Fulgar - Follow and Rate!
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('jquery.js')}}"></script>
    <script src="{{asset('datatables.min.js')}}"></script>
    @vite('resources/js/app.js')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };

        $(document).ready(function(){

            $("#list-employees-table").DataTable({
                scrollX: true
            });

            $("#list-employees-leaves-table").DataTable();

            $(document).on('change', '#employee-select-pending', function(){
                
                const type = $(this).val();

                if(type == "Pending"){
                    window.location.href = `${window.location.origin}/employee/list/leave?type=Pending`
                }else if(type == "Approved"){
                    window.location.href = `${window.location.origin}/employee/list/leave?type=Approved`
                }else if(type == "Declined"){
                    window.location.href = `${window.location.origin}/employee/list/leave?type=Declined`
                }else{
                    window.location.href = `${window.location.origin}/employee/list/leave`
                }
            });

        });
    </script>
    
</body>
</html>