{{--Untuk ngeextend main.blade.php--}}
@extends('main')

@section('title', 'Login')

@section('body')
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <div class="col-md-8" style="background-image: url('https://wallpaperaccess.com/full/1401021.jpg'); background-size: cover;"></div>
            <div class="col-md-4 bg-dark-red text-light d-flex align-items-center justify-content-center" style="font-family: 'Fangsong', serif;">
                <div class="container">
                    <div class="row">
                        <div class="mx-auto p-2 col-md-8">
                            <h2 class="fw-bold text-center mb-4" style="font-size: 3rem;">Login</h2>
                            <form method="post" action={{url("/login")}}>
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label" style="font-size: 1.2rem;">Email address</label>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="name@gmail.com">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label" style="font-size: 1.2rem;">Password</label>
                                    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                                <div class="mb-3 form-check">
                                    <input name="remember_me" type="checkbox" class="form-check-input" id="rememberMe" value="true" {{ old('remember_me') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="rememberMe" style="font-size: 1.2rem;">Remember me</label>
                                </div>

                                <button id="loginButton" type="submit" class="btn btn-primary w-100" style="font-size: 1.2rem;">Login</button>
                                <p class="mt-3 text-center" style="font-size: 1.2rem;">Don't have an account? <a href={{url('/register')}}>Sign up</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
