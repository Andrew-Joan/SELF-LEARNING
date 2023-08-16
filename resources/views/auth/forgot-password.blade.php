@extends('layouts.main')

@section('content')
    <div class="d-flex align-items-center justify-content-center" style="height: 62vh">
        <div>
            <div class="d-flex flex-column align-items-center">
                @if(session()->has('status'))
                    <div class="alert alert-success alert-dismissible fade show" role ="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h2>Forget Your Password? </h2>
                <p>Please enter your email to request password reset</p>
            </div>

            <div>
                <form action="{{ route('password.email') }}" method="post">
                    @csrf
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="submit" value="Request Password Request" class="btn btn-primary w-100 mt-3"></input>
                </form>
            </div>
        </div>
    </div>
@endsection