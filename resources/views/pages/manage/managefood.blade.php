@extends('main')

@section('title', 'Manage Foods')

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

        .card {
            border: 4px solid #c0392b; /* Set card border to 4px */
        }

        .btn-primary {
            background-color: #c0392b;
            border-color: #c0392b;
            color: #ffffff;
        }

        .btn-danger {
            background-color: #c0392b;
            border-color: #c0392b;
            color: #ffffff;
        }
        .form-control {
            border: 2.5px solid #c0392b;
            border-radius: 0;
            height: 40px;
        }
        .form-check-input {
            border-width: 2.5px;
        }

        .form-check-label {
            font-weight: bold;
        }

        .search-button {
            background-color: #c0392b;
            border-color: #c0392b;
            color: #ffffff;
            height: 40px;
            width: 100px;
            border-radius: 0;
        }
    </style>
    <div class="container">
        <br>
        <h3 style="font-weight: 700; color: #c0392b;">Manage Foods</h3>
        <br>
        <div class="row">
            <form method="post" action="{{ url('/manageFood') }}" class="col-md-8">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" id="food-title" name="searchBar" class="form-control" placeholder="Enter food name" style="width: 70%;">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="food-category" style="color: #000000;">Filter by Category:</label>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="mainCourseMarker" id="main-course" class="form-check-input" value="FT001">
                        <label class="form-check-label" for="main-course">Main Course</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="beverageMarker" id="beverages" class="form-check-input" value="FT002">
                        <label class="form-check-label" for="beverages">Beverages</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="dessertMarker" id="dessert" class="form-check-input" value="FT003">
                        <label class="form-check-label" for="dessert">Dessert</label>
                    </div>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-12">
                @if (count($foods) > 0)
                    @foreach ($foods as $food)
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="{{ url('/detail/'. $food->getAttributes()['FoodID']) }}">
                                            <img src="{{ asset('foodPicture\\' . $food->FoodImage) }}" alt="Food Image" class="img-fluid" style="max-height: 200px; object-fit: cover;">
                                        </a>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">
                                                <a href="{{ url('/detail/'. $food->getAttributes()['FoodID']) }}" style="color: #c0392b; font-weight: 700;">{{ $food->FoodName }}</a>
                                            </h5>
                                            <div class="btn-group" role="group">
                                                <a href="{{ url('/updateFood/'. $food->getAttributes()['FoodID']) }}" class="btn btn-primary">Update</a>
{{--                                                <button class="btn btn-danger btn-delete" data-food-id="{{ $food->id }}">Delete</button>--}}
                                                <form method="post" action="/deleteFood">
                                                    @csrf
                                                    <input name="FoodID" type="hidden" value="{{ $food->getAttributes()['FoodID'] }}">
                                                    <button class="btn btn-danger btn-delete">Remove</button>
                                                </form>
                                            </div>
                                        </div>
                                        <p class="card-text" style="color: #000000;"><b>Category:</b> <br>{{ $food->foodType->FoodTypeName }}</p>
                                        <p class="card-text" style="color: #000000;"><b>Description:</b> <br>{{ $food->FoodBriefDescription }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-info" role="alert">
                        Food is not yet invented here...
                    </div>
                @endif
            </div>
        </div>
    </div>

    @include('components.navbar.footer')

    <!-- Modal code here -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel" style="color: #c0392b;">Delete Food</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p style="color: #000000;">Are you sure you want to delete this food?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteFood(foodId) {
            // Perform delete action
            window.location.href = "{{ url('/deleteFood/') }}" + '/' + foodId;
        }

        var deleteConfirmationModal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'), {});
        document.querySelectorAll('.btn-delete').forEach(function (button) {
            button.addEventListener('click', function () {
                var foodId = this.dataset.foodId;
                deleteConfirmationModal.show();
                document.getElementById('deleteButton').addEventListener('click', function () {
                    deleteFood(foodId);
                });
            });
        });
    </script>
@endsection
