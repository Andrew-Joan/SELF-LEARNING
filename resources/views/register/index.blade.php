@extends('layouts.main')

@section('content')

    <div class="row justify-content-center align-items-center w-100" style="height: 85vh;">
        <div class="col-lg-5">
            <main class="form-registration">
                <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
                <form action="/register" method="post">
                    @csrf
                    {{-- csrf ini untuk ngelindungin website kita dari serangan luar yang coba ngakses lewat form kita --}}
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                        <label for="name">Name</label>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        {{-- $message ini sudah bawaan dari laravelnya, tinggal kita panggil aja --}}
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Name" required value="{{ old('username') }}">
                        <label for="username">Username</label>
                        @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                        {{-- $message ini sudah bawaan dari laravelnya, tinggal kita panggil aja --}}
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="example@gmail.com" required value="{{ old('email') }}">
                        <label for="email">Email</label>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        {{-- $message ini sudah bawaan dari laravelnya, tinggal kita panggil aja --}}
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="example@gmail.com">
                        <label for="password">Password</label>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        {{-- $message ini sudah bawaan dari laravelnya, tinggal kita panggil aja --}}
                        @enderror
                    </div>
        
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-3">Already registered? <a href="/login">Login</a></small>
            </main>
        </div>
    </div>
@endsection