@extends('main')

@section('title', 'Create Food')

@section('body')
    @include('components.navbar.header')
    <style>
        body {
            font-family: 'Noto Sans SC', sans-serif;
            background-image: url('/foodPicture/background.png');
            font-size: 16px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
        }

        .form-label,
        .form-control {
            color: #000000; /* Set text color to black */
        }

        .form-label-bg {
            background-color: #9e1b08; /* Set label background color */
            color: #ffffff; /* Set label text color to white */
            padding: 5px 10px; /* Add padding to the label */
            border-radius: 8px; /* Adjust border radius for a better shape */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
        }

        .form-control {
            border: 5px solid #c0392b; /* Set field area border to 5px */
            border-radius: 8px; /* Adjust border radius for a better shape */
        }

        .form-select {
            border: 5px solid #c0392b; /* Set dropdown field border to 5px */
            border-radius: 8px; /* Adjust border radius for a better shape */
        }

        .btn-secondary,
        .btn-primary {
            background-color: #c0392b; /* Set button background color */
            border-color: #c0392b; /* Set button border color */
            color: #ffffff; /* Set button text color to white */
        }
    </style>
    <div class="container">
        <br>
        <h3 style="font-weight: 700; color: #c0392b;">Add New Food</h3>
        <form method="post" action="{{ url("/createFood") }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="food_name" class="form-label form-label-bg">Food Name</label>
                <input type="text" class="form-control" id="food_name" name="foodName" required>
            </div>
            <div class="mb-3">
                <label for="food_brief_description" class="form-label form-label-bg">Food Brief Description</label>
                <textarea class="form-control" id="food_brief_description" name="foodBriefDesc" required></textarea>
            </div>
            <div class="mb-3">
                <label for="food_full_description" class="form-label form-label-bg">Food Full Description</label>
                <textarea class="form-control" id="food_full_description" name="foodFullDesc" required></textarea>
            </div>
            <div class="mb-3">
                <label for="food_category" class="form-label form-label-bg">Food Category</label>
                <select class="form-select" id="food_category" name="foodCategory" required>
                    <option value="main_course">Main Course</option>
                    <option value="beverage">Beverage</option>
                    <option value="dessert">Dessert</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="food_price" class="form-label form-label-bg">Food Price</label>
                <input type="number" class="form-control" id="food_price" name="foodPrice" required>
            </div>
            <div class="mb-3">
                <label for="food_picture" class="form-label form-label-bg">Food Picture</label>
                <input type="file" class="form-control" id="food_picture" name="foodPicture" required>
            </div>
            <div class="text-end">
                <a href="/home" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <br><br>
        </form>
    </div>

    @include('components.navbar.footer')
@endsection
