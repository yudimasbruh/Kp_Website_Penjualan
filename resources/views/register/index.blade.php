@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-3">
            <main class="form-registration">
                <h3 class="=h3 mb-3 fw-normal">Form Registrasi</h3>
                <form action="/dashboard/register" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="nama" class="form-control rounded-top @error('nama') is invalid @enderror" id="name" placeholder="Name"
                        required value="{{ old('nama') }}">
                        <label for="name">Name</label>
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>   
                    <div class="form-floating mb-3">
                            <input type="email"name ="email" class="form-control @error('email') is invalid @enderror" id="email" placeholder="name@example.com"
                            required value="{{ old('email') }}">
                            <label for="floatingInput">Email address</label>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name ="telepon" class="form-control @error('telepon') is invalid @enderror" id="telepon" placeholder="+62"
                        required value="{{ old('telepon') }}">
                        <label for="floatingInput">Nomor Telepon</label>
                        @error('telepon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control rounded-bottom" id="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                </form>
                <small class="d-block text -center mt-3">Already Register?<a href="/login">Login</a></small>
            </main>
        </div>
    </div>
</div>
@endsection