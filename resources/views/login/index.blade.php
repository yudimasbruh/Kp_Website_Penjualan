@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-3">
            <main class="form-registration">
                <h3 class="=h3 mb-3 fw-normal">Form Login</h3>
                @if($msg = Session::get("login-failed"))
                <div class="alert alert-danger mt-3 mb-3">
                    <span>{{$msg}}</span>
                </div>
                @endif
                <form action="/dashboard/login" method="POST">
                    @csrf 
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
                            <input type="password" name="password" class="form-control rounded-bottom" id="password" placeholder="Password">
                            <label for="password">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
                <small class="d-block text -center mt-3">Doesn't have account yet ?<a href="/register">Register</a></small>
            </main>
        </div>
    </div>
</div>
@endsection