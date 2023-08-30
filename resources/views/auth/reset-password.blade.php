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
                <h2>Enter New Password (Min: 8 Characters)</h2>
            </div>

            <div>
                <form action="{{ route('password.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ request()->email }}">

                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control mb-2 @error('password') is-invalid @enderror" name="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="password_confirmation" class="form-label">Password Confirmation</label>
                    <input type="password" class="form-control" name="password_confirmation">
                    <input type="submit" value="Update Password" class="btn btn-primary w-100 mt-3"></input>
                </form>
            </div>
        </div>
    </div>
@endsection