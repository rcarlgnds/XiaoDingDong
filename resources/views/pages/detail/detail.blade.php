@extends('main')

@section('title', 'Food Details')

@section('styles')
    <style>
        /* Font */
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@400;700&display=swap');

        body {
            font-family: 'Noto Sans SC', sans-serif;
            background-image: url('/foodPicture/background.png');
            font-size: 18px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
        }

        p.text-muted,
        .btn-primary {
            color: #ffffff;
        }

        .btn-primary {
            background-color: #E74C3C;
            border-color: #E74C3C;
        }

        .btn-primary:hover {
            background-color: #C0392B;
            border-color: #C0392B;
        }

        .menu-item-img {
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .containerr {
            background-color: #f7ffdd;
            padding: 20px;
            border-radius: 30px;
            margin-top: 30px;
            margin-bottom: 30px;
            margin-left: 30px;
            margin-right: 30px;
        }
    </style>
@endsection

@section('body')
    @include('components.navbar.header')

    <div class="containerr pt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('foodPicture/' . $food->FoodImage) }}" alt="Food Image" class="img-fluid rounded shadow menu-item-img">
            </div>

            <div class="col-md-6">
                @if(session()->has('user') && session('user')->Role === 'User')
                    <form method="post" action="/addToCart">
                        @else
                            <form>
                                @endif
                                @csrf
                                <h3 style="text-transform: uppercase; font-size: 24px;">{{ $food->FoodName }}</h3><br>
                                <b><p class="text-muted" style="font-size: 20px;">Brief Description :</p></b>
                                <p>{{ $food->FoodBriefDescription }}</p>
                                <b><p class="text-muted" style="font-size: 20px;">Food Type :</p></b>
                                <p>{{ $food->foodType->FoodTypeName }}</p>
                                @if(session()->has('user') && session('user')->Role === 'User')
                                    <input name="FoodID" type="hidden" value="{{ $food->getAttributes()['FoodID'] }}">
                                    <b><p class="text-muted" style="font-size: 20px;">Treat Yourself :</p></b>
                                    <button class="btn btn-primary" style="background-color: #E74C3C; border-color: #E74C3C;">Add to Cart</button>
                                @endif
                            </form>
            </div>
        </div>

        <div class="mt-5">
            <b><p class="text-muted" style="font-size: 20px;">About This Food</p></b>
            <p>{{ $food['FoodFullDescription'] }}</p>
        </div>
    </div>
    @include('components.navbar.footer')
@endsection

