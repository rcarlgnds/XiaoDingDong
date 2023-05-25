@extends('main')

@section('title', 'Home')

@section('body')
    @include('components.navbar.header')

    <div class="container">
        <br>
        <h2>菜单 | Menu</h2>
        <br>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="main-course-tab" data-bs-toggle="tab" href="#main-course"><b>主菜 | Main Course</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="beverages-tab" data-bs-toggle="tab" href="#beverages"><b>饮料 | Beverages</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="desserts-tab" data-bs-toggle="tab" href="#desserts"><b>甜点 | Desserts</b></a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="main-course">
                <br>
                <center><h4 class="p-2" style="background-color: #9e1b08; color: #fcfdaf;">主菜 | Main Course</h4></center>
                <div class="row">
                    @foreach($foods as $food)
                        @if($food->FoodTypeID === 'FT001')
                            <div class="col-md-4">
                                <div class="menu-item">
                                    <a href="{{ url('/detail/'. $food->getAttributes()['FoodID']) }}">
                                        <img src="{{ asset('foodPicture/' . $food->FoodImage) }}" alt="{{ $food->FoodName }}" class="menu-item-img">
                                        <h4 class="menu-item-name p-2" style="background-color: #9e1b08; color: #fcfdaf;">{{ $food->FoodName }}</h4>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="beverages">
                <br>
                <center><h4 class="p-2" style="background-color: #9e1b08; color: #fcfdaf;">饮料 | Beverages</h4></center>
                <div class="row">
                    @foreach($foods as $food)
                        @if($food->FoodTypeID === 'FT002')
                            <div class="col-md-4">
                                <div class="menu-item">
                                    <a href="{{ url('/detail/'. $food->getAttributes()['FoodID'])}}">
                                        <img src="{{ asset('foodPicture/' . $food->FoodImage) }}" alt="{{ $food->FoodName }}" class="menu-item-img">
                                        <h4 class="menu-item-name p-2" style="background-color: #9e1b08; color: #fcfdaf;"">{{ $food->FoodName }}</h4>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="desserts">
                <br>
                <center><h4 class="p-2" style="background-color: #9e1b08; color: #fcfdaf;">甜点 | Desserts</h4></center>
                <div class="row">
                    @foreach($foods as $food)
                        @if($food->FoodTypeID === 'FT003')
                            <div class="col-md-4">
                                <div class="menu-item">
                                    <a href="{{ url('/detail/'. $food->getAttributes()['FoodID'])}}">
                                        <img src="{{ asset('foodPicture/' . $food->FoodImage) }}" alt="{{ $food->FoodName }}" class="menu-item-img">
                                        <h4 class="menu-item-name p-2" style="background-color: #9e1b08; color: #fcfdaf;">{{ $food->FoodName }}</h4>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

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

        h2, h4 {
            font-weight: 700;
            color: #9e1b08;
        }

        /* Colors */
        :root {
            --primary-color: #9e1b08;
            --secondary-color: #f39c12;
            --background-color: #f7f7f7;
            --text-color: 	 #fcfdaf;
            --inactive-tab-color: #9e1b08;
        }

        .nav-tabs .nav-link.active {
            background-color: var(--primary-color);
            color: var(--text-color);
        }

        .nav-tabs .nav-link {
            color: var(--text-color);
            background-color: var(--inactive-tab-color);
        }

        .menu-item-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border: 1px solid var(--text-color);
            border-radius: 4px;
        }

        .menu-item-name {
            text-align: center;
            text-decoration: none !important;
            color: var(--text-color);
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .menu-item-name:hover {
            background-color: var(--secondary-color);
        }

        .menu-item-name a {
            text-decoration: none;
        }

        html, body {
            height: 100%;
        }

        .wrapper {
            min-height: 100%;
            margin-bottom: -120px; /* Adjust the margin to make space for the footer */
        }
    </style>
    @include('components.navbar.footer')
@endsection
