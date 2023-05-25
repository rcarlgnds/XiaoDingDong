@extends('main')

@section('title', 'Edit Profile')

@section('styles')
    <style>
        /* Font */
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@400;700&display=swap');

        body {
            font-family: 'Noto Sans SC', sans-serif;
            font-size: 16px;
            background-image: url('/foodPicture/background.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
        }

        .nav-link,
        .btn-primary {
            color: #ffffff;
        }

        .btn-primary {
            background-color: 	#9e1b08;
            border-color: 	#9e1b08;
            border-width: 4px;
        }

        .btn-primary:hover {
            background-color: #C0392B;
            border-color: #C0392B;
        }

        /* Left Sidebar */
        .sidebar {
            margin-top: 70px;
        }

        /* Profile Image */
        .rounded-circl {
            background-color: transparent;
            width: 150px;
            height: 150px;
            margin-top: 70px;
            margin-left: 30px;
            /*border: 1px solid #9e1b08;*/
        }

        /* Form Fields */
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"] {
            border: 4px solid #9e1b08;
            background-color: #F5F5F5;
            border-radius: 0px;
            padding: 10px;
            color: #000000;
        }

        label {
            background-color: 	#9e1b08;
            color: #efd780;
            padding: 5px 10px;
            border-radius: 0px;
            margin-bottom: 0px;
            display: block;
        }
    </style>
@endsection

@section('body')
    @include('components.navbar.header', ['class' => 'custom-header'])

    <div class="container">
        <div class="row">
            <div class="col-md-3 sidebar"></div>
            <div class="col-md-6">
                <br>
                <h3>Edit Profile</h3>
                <form method="post" action="{{ url('/updateProfile') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ session('user')->UserName }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ session('user')->UserEmail }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="{{ session('user')->UserPhoneNumber }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="{{ session('user')->UserAddress }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="previous_password">Current Password</label>
                        <input type="password" class="form-control" id="previous_password" name="previous_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password">Confirm New Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                    <br>
            </div>
            <div class="col-md-3">
                <label class="rounded-circl overflow-hidden img-overlay" for="profile_image">
                    <input type="file" id="profile_image" name="profile_image" style="display: none;">
                    <img src="{{ asset('profilePicture/' . session('user')->UserProfileImage) }}" alt="Profile Photo" class="img-fluid" style="width: 100%; height: 100%;">
                </label>
            </div>
            </form>
        </div>
    </div>

    @include('components.navbar.footer')
@endsection
