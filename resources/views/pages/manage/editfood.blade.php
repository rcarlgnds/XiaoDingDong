@extends('main')

@section('title', 'Edit Food')

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

        .form-label {
            background-color: #c0392b;
            color: #ffffff;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-control {
            border: 4px solid #c0392b;
        }

        .form-select {
            border: 4px solid #c0392b;
            background-color: #ffffff;
        }

        .btn-primary {
            background-color: #c0392b;
            border-color: #c0392b;
            color: #ffffff;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="rounded overflow-hidden img-overlay" style="width: 150px; height: 150px; margin-top: 70px; margin-right: 30px; border: 4px solid #c0392b;">
                    <input type="file" id="food_image_preview" name="food_image_preview" style="display: none;">
                    <img src="{{ asset('foodPicture\\' . $food->FoodImage) }}" alt="Food Photo" class="img-fluid rounded" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
            <div class="col-md-6" style="margin-top: 30px;">
                <h3>Update Food</h3>
                <br>
                <form method="post" action="{{ url('/updateFood/'.$food->FoodID) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="food_name" class="form-label">Food Name</label>
                        <input type="text" class="form-control" id="food_name" name="food_name" placeholder="Food Name" value="{{ $food->FoodName }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="food_description_brief" class="form-label">Brief Description</label>
                        <textarea class="form-control" id="food_description_brief" name="food_description_brief" placeholder="Brief Description" required>{{ $food->FoodDescriptionBrief }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="food_description_full" class="form-label">Full Description</label>
                        <textarea class="form-control" id="food_description_full" name="food_description_full" placeholder="Full Description" required>{{ $food->FoodDescriptionFull }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="food_type" class="form-label">Food Category</label>
                        <select class="form-select" id="food_type" name="food_type" required>
                            <option value="" selected disabled>Select Food Type</option>
                            <option value="FT001" {{ $food->foodType->FoodTypeName === 'Main Course' ? 'selected' : '' }}>Main Course</option>
                            <option value="FT002" {{ $food->foodType->FoodTypeName === 'Beverage' ? 'selected' : '' }}>Beverage</option>
                            <option value="FT003" {{ $food->foodType->FoodTypeName === 'Dessert' ? 'selected' : '' }}>Dessert</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="food_price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="food_price" name="food_price" placeholder="Food Price" value="{{ $food->FoodPrice }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="food_image" class="form-label">Food Image</label>
                        <input type="file" class="form-control" id="food_image" name="food_image" required>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Update Food</button>
                    </div>
                    <br><br>
                </form>
            </div>
        </div>
    </div>

    @include('components.navbar.footer')
@endsection
