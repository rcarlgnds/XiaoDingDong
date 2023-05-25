@extends('main')

@section('title', 'Receipt')

@section('body')
    @include('components.navbar.header')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div style="background-color: #fff; padding: 20px; border-radius: 10px;">
                    <h2 style="color: #c0392b; margin-bottom: 20px;">Receipt</h2>
                    <p>Transaction ID: ABC123</p>
                    <p>Purchased Date: May 16, 2023</p>
                    <h4 style="color: #c0392b; margin-bottom: 10px;">Ordered Food</h4>
                    <ul class="food-list" style="list-style: none; padding-left: 0;">
                        <li style="display: flex; align-items: center; margin-bottom: 10px;">
                            <img src="food_item1.jpg" alt="Food Item 1" class="food-image" style="width: 60px; height: 60px; border-radius: 50%; margin-right: 10px;">
                            <span style="color: #000000;">Food Item 1 - $10.99</span>
                        </li>
                        <li style="display: flex; align-items: center; margin-bottom: 10px;">
                            <img src="food_item2.jpg" alt="Food Item 2" class="food-image" style="width: 60px; height: 60px; border-radius: 50%; margin-right: 10px;">
                            <span style="color: #000000;">Food Item 2 - $8.99</span>
                        </li>
                        <li style="display: flex; align-items: center; margin-bottom: 10px;">
                            <img src="food_item3.jpg" alt="Food Item 3" class="food-image" style="width: 60px; height: 60px; border-radius: 50%; margin-right: 10px;">
                            <span style="color: #000000;">Food Item 3 - $12.99</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div style="background-color: #fff; padding: 20px; border-radius: 10px; text-align: right;">
                    <h4 style="color: #c0392b;">Total Price: $32.97</h4>
                </div>
            </div>
        </div>
    </div>
    @include('components.navbar.footer')
@endsection
