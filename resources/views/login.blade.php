
@extends('layouts/head')


<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center h-100">

            <div class="col-xl-10 col-lg-12 col-md-9  my-auto">

                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="{{ asset('images/img-login.jpg') }}" class="bg-login-image" width="100%" height="auto" alt="login">
                            </div>

                            <div class="col-lg-6 mt-5">
                                <div class="p-5">
                                    <div class="text-center py-3">
                                        <img src="{{ asset('images/logo_it.png') }}" width="150px" height="auto" alt="logo" class="img-fluid mb-3">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome to GudangIT!</h1>
                                    </div>
                                    <form class="login" action="" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" id="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                                 name="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." value="{{ old('email') }}" >
                                                @error('email')
                                                    <div class="invalid-feedback ml-3">{{ $message }}</div>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                                            <span class="icon-eye" onclick="password_show_hide();">
                                                <i class="fas fa-eye text-gray-500" id="show_eye"></i>
                                                <i class="fas fa-eye-slash d-none text-gray-500" id="hide_eye"></i>
                                            </span>
                                            @error('password')
                                            <div class="invalid-feedback ml-3">{{ $message }}</div>
                                            @enderror
                                        </div> 
                                        <hr>
                                        {{-- @if ($errors->any())    
                                        <div class="alert alert-danger">
                                                @foreach ($errors->all() as $item)
                                                    <span>{{$item}}</span>
                                                @endforeach
                                        </div>         
                                        @endif  --}}
                                        <button class="btn btn-primary btn-user btn-block" type="submit">
                                            Login
                                        </button>
                                        <div class="form-group text-center mt-3">
                                            <small>Not registered? <a href="{{ route('register') }}">Register Now!</a></small>
                                         </div> 
                                    </form>                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    @include('layouts/bottom')

</body>

</html>