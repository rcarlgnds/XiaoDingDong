@extends('main')

@section('title', 'Cart')

@section('styles')
    <style>
        /* Font */
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@400;700&display=swap');

        body {
            font-family: 'Noto Sans SC', sans-serif;
            background-image: url('/foodPicture/background.png');
            font-size: 16px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
        }

        .cart-title {
            margin-bottom: 20px;
            font-size: 24px;
            color: 	#efd780;
        }

        .cart-table {
            margin-bottom: 20px;
            background-color: #eaeaea;
        }

        .cart-total {
            margin-top: 30px;
            text-align: right;
            font-size: 18px;
            color: #E74C3C;
        }

        .cart-checkout {
            color: 	#efd780;
            margin-top: 20px;
            text-align: right;
        }

        .cart-checkout .btn-primary {
            background-color: #E74C3C;
            border-color: #E74C3C;
        }

        .cart-checkout .btn-primary:hover {
            background-color: #C0392B;
            border-color: #C0392B;
        }

        .cart-checkout .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(231, 76, 60, 0.5);
        }

        /* Quantity Plus and Minus Buttons */
        .quantity {
            display: flex;
            align-items: center;
        }

        .quantity-input {
            width: 40px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin: 0 5px;
        }

        .quantity-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            border: 1px solid #ccc;
            background-color: transparent;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .quantity-btn:hover {
            background-color: #f2f2f2;
        }

        .quantity-btn i {
            font-size: 12px;
            color: #888;
        }

        /* Bottom padding */
        .container {
            padding-bottom: 50px; /* Adjust the value as needed */
        }

        /* Center align text in the empty cart message */
        .empty-cart-message {
            text-align: center;
            color: #4e0000;
        }

        /* Style the remove button */
        .btn-remove {
            color: #efd780;
            background-color: #E74C3C;
            border-color: #E74C3C;
        }

        .btn-remove:hover {
            background-color: #C0392B;
            border-color: #C0392B;
        }

        .btn-remove:focus {
            box-shadow: 0 0 0 0.2rem rgba(231, 76, 60, 0.5);
        }

        /* Adjust spacing between table columns */
        .cart-table th,
        .cart-table td {
            padding: 10px;
        }
    </style>
@endsection

@section('body')
    @include('components.navbar.header')
    <?php $totalPrice = 0; ?>
    <div class="container">
        <br>
        <h3>Your Cart</h3>
        @if(count($carts) > 0)
            <table class="table cart-table">
                <thead>
                <tr>
                    <th style="color: #efd780">Product</th>
                    <th style="color: #efd780">Price</th>
                    <th style="color: #efd780">Quantity</th>
                    <th style="color: #efd780">Total</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($carts as $cart)
                    <tr>
                        <td>{{ $cart->food->FoodName }}</td>
                        <td>{{ $cart->food->FoodPrice }}</td>
                        <td>
                            <div class="quantity">
                                <form action="{{ url('cart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="action_type" value="decrease">
                                    <input type="hidden" name="cart_id" value="{{ $cart->CartID }}">
                                    <input type="hidden" name="food_id" value="{{ $cart->food->FoodID }}">
                                    <button type="submit" class="quantity-btn minus-btn">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </form>
                                <input type="text" name="quantity" value="{{ $cart->Quantity }}" disabled class="quantity-input">
                                <form action="{{ url('cart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="action_type" value="increase">
                                    <input type="hidden" name="cart_id" value="{{ $cart->CartID }}">
                                    <input type="hidden" name="food_id" value="{{ $cart->food->FoodID }}">
                                    <button type="submit" class="quantity-btn plus-btn">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                        <td>{{ $cart->food->FoodPrice * $cart->Quantity }}</td>
                        <?php $totalPrice += $cart->food->FoodPrice * $cart->Quantity; ?>
                        <td>
                            <form method="post" action="/deleteFromCart">
                                @csrf
                                <input name="FoodID" type="hidden" value="{{ $cart->getAttributes()['FoodID'] }}">
                                <button class="btn btn-remove">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row justify-content-end">
                <br>
                <div class="col-md-4">
                    <br>
                    <div class="cart-total">
                        <h4><b>Total Price: ${{ $totalPrice }}</b></h4>
                    </div>
                    <div class="cart-checkout">
                        <a href="/checkOut" class="btn btn-primary">Proceed to Checkout</a>
                    </div>
                    <br>
                </div>
            </div>
        @else
            <div class="empty-cart-message">
                <br><br><br><br><br><br>
                <h4 class="no-transactions"><b>Your cart is empty.</b></h4>
                <br><br><br><br><br><br>
            </div>
        @endif
    </div>

    @include('components.navbar.footer')
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.plus-btn').click(function() {
                var input = $(this).prev('input');
                var quantity = parseInt(input.val()) + 1;
                input.val(quantity);
            });

            $('.minus-btn').click(function() {
                var input = $(this).next('input');
                var quantity = parseInt(input.val()) - 1;
                if (quantity >= 0) {
                    input.val(quantity);
                }
            });
        });
    </script>
    @include('components.navbar.footer')
@endsection
