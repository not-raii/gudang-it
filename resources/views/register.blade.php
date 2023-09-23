
@extends('layouts/head')


<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center h-100">

            <div class="col-lg-7 col-md-9 mt-3 my-auto">

                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                                <div class="p-5 form-register">
                                    <div class="text-center py-3">
                                        <img src="{{ asset('images/logo_it.png') }}" width="100px" height="auto" alt="logo" class="img-fluid mb-3">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome to Gudang IT!</h1>
                                    </div>
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="inp-content mb-5">
                                                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                                                        <span class="inp-label">Nama Lengkap</span>
                                                            @error('name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select name="role_id" id="role_id" class="form-select custom-select @error('role_id') is-invalid @enderror">
                                                        <option value="" selected>Pilih Role</option>
                                                        @foreach ($user as $item)
                                                            @if ($item->name=='Employee')
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @error('role_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="inp-content mb-5">
                                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" aria-describedby="emailHelp" value="{{ old('email') }}" required >
                                                <span class="inp-label">Email Address</span>
                                                    @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                            </label>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="inp-content mb-5">
                                                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                                                         name="password" required>
                                                        <span class="inp-label">Password</span>
                                                        @error('password')
                                                         <div class="invalid-feedback">{{ $message }}</div>
                                                         @enderror
                                                    </label>
                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="inp-content mb-5">
                                                        <input type="password"class="form-control"
                                                         name="password_confirmation" required>
                                                        <span class="inp-label">Repeat Password</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary btn-user btn-block" type="submit">
                                            Register Account
                                        </button>
                                        <div class="form-group text-center mt-3">
                                            <small>Already have an account? <a href="{{ route('/') }}">Login!</a></small>
                                         </div>
                                    </form>                                 
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