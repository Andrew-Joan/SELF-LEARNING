@extends('layouts.main')

@section('content')
<div class="row justify-content-center align-items-center w-100" style="min-height: 85vh;">
    <div class="col-lg-5">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role ="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">{{ auth()->user()->name }} Profile</h1>
            <form action="{{ route('profile.update', ['user' => auth()->id()]) }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                {{-- csrf ini untuk ngelindungin website kita dari serangan luar yang coba ngakses lewat form kita --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Profile Picture</label>
                    @if(auth()->user()->image)
                        <img src="{{ asset('storage/' . auth()->user()->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @endif
                    <input class="form-control rounded @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control rounded" style="background-color: rgb(197, 193, 193);" id="name" name="name" value="{{ auth()->user()->name }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control rounded @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', auth()->user()->username) }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control rounded @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', auth()->user()->email) }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control rounded @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter current password to update the data!">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="new-password" class="form-label">New Password</label>
                    <input type="password" class="form-control rounded @error('new-password') is-invalid @enderror" id="new-password" name="new-password" placeholder="Optional">
                    @error('new-password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
    
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Update Profile Data</button>
            </form>
        </main>
    </div>
</div>

<script>
    function previewImage()
    {
        const img = document.querySelector("#image");
        const imgPreview = document.querySelector(".img-preview");
        const blob = URL.createObjectURL(image.files[0]);
        imgPreview.src = blob;
    }
</script>
@endsection