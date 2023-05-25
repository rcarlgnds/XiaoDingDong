{{-- Untuk ngeextend main.blade.php --}}
@extends('main')

@section('title', 'Register')

@section('body')
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <div class="col-md-8" style="background-image: url('https://wallpaperaccess.com/full/1401021.jpg'); background-size: cover;"></div>
            <div class="col-md-4 bg-dark-red text-light d-flex align-items-center justify-content-center" style="font-family: 'Fangsong', serif;">
                <div class="container">
                    <div class="row">
                        <div class="mx-auto p-2 col-md-8">
                            <h2 class="fw-bold text-center mb-4" style="font-size: 3rem;">Register</h2>
                            <form method="post" action={{url("/register")}}>
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label" style="font-size: 1.2rem;">Email address</label>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="name@gmail.com">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label" style="font-size: 1.2rem;">Username</label>
                                    <input name="username" type="text" class="form-control" id="username" placeholder="Username">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label" style="font-size: 1.2rem;">Password</label>
                                    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label" style="font-size: 1.2rem;">Confirm Password</label>
                                    <input name="confirmPassword" type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                                </div>
                                <button type="submit" class="btn btn-primary w-100" style="font-size: 1.2rem;">Register</button>
                                <p class="mt-3 text-center" style="font-size: 1.2rem;">Already have an account? <a href={{url('/login')}}>Log in</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
