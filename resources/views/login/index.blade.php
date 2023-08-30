@extends('layouts.main')

@section('content')

    <div class="row justify-content-center align-items-center w-100" style="height: 85vh;">
        <div class="col-md-4">

            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session()->has('status'))
                    <div class="alert alert-success alert-dismissible fade show" role ="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            @endif


            @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            <main class="form-signin w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Login <Form:get></Form:get></h1>
                <form action="\login" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" 
                            autofocus required @if(isset($_COOKIE["email"])) value="{{ $_COOKIE["email"] }}" @else value="{{ old('email') }}" @endif>
                        <label for="floatingInput">Email address</label>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required @if(isset($_COOKIE["password"])) value="{{ $_COOKIE["password"] }}" @endif>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <div class="d-flex align-items-center gap-1">
                            <input type="checkbox" id="remember" name="remember" @if(isset($_COOKIE["email"])) checked @endif>
                            <label for="remember">Remember Me</label>
                        </div>

                        <a href="{{ route('password.request') }}" class="text-danger">Forgot Password?</a>
                    </div>
                    
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
                <small class="d-block text-center mt-3">Not registered? <a href="/register" class="text-info">Register Now!</a></small>
            </main>
        </div>
    </div>
@endsection