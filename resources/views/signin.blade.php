<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/sass/app.scss')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body class="bg-light">
    
    <div class="container-fluid">
        <div class="vh-100 row justify-content-center align-items-center">
            <div class="col-xl-3 col-lg-6 col-md-8 col-sm-10 col-12">
                <div class="card border-0 shadow-sm bg-white">
                    <div class="card-body">
                        <div class="my-3 text-center">
                            <i class="bi bi-person-fill display-4"></i>
                            <h1 class="lead">LOG IN</h1>
                        </div>
                        <div class="my-2"></div>
                        <div class="my-2">
                            <form action="{{route('signin.post')}}" method="POST">
                                @csrf()
                                @method('POST')
                                <div class="my-2">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                        <input type="text" class="form-control shadow-none" name="username" value="{{old('username')}}" placeholder="Username">
                                    </div>
                                    @error('username')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="my-2">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                        <input type="Password" class="form-control shadow-none" name="password" placeholder="Password">
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="my-3 d-grid">
                                    <button type="submit" class="btn btn-dark shadow-none">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @vite('resources/js/app.js')
</body>
</html>