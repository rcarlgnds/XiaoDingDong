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

        .checkout-title {
            margin-bottom: 20px;
            font-size: 24px;
            color: #E74C3C;
        }

        .form-label {
            color: #efd780;
            background-color: #9E1B08;
            padding: 5px;
            border-radius: 3px;
        }

        .form-control {
            border-color: #E74C3C;
            border-width: 4px;
        }

        .btn-cancel {
            background-color: #E74C3C;
            border-color: #E74C3C;
            color: #fff;
        }

        .btn-cancel:hover {
            background-color: #C0392B;
            border-color: #C0392B;
        }

        .btn-place-order {
            background-color: #E74C3C;
            border-color: #E74C3C;
            color: #fff;
        }

        .btn-place-order:hover {
            background-color: #C0392B;
            border-color: #C0392B;
        }

        .d-flex.justify-content-end {
            justify-content: center;
        }

        /* Bottom padding */
        /*.container {*/
        /*    padding-bottom: 10px; */
        /*}*/
    </style>
@endsection

@section('body')
    @include('components.navbar.header')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <br>
                <h3>Checkout</h3>
                <form action="/checkOut" method="post">
                @csrf
                <!-- Billing Information -->
                    <br>
                    <h4><b>Billing Information</b></h4>
                    <div class="form-group">
                        <label class="form-label" for="name">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="phone">Phone Number</label>
                        <input type="phone" name="phone" id="phone" class="form-control" required>
                    </div>
                    <!-- Add more billing fields as needed -->

                    <!-- Shipping Information -->
                    <br>
                    <h4><b>Shipping Information</b></h4>
                    <div class="form-group">
                        <label class="form-label" for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="city">City</label>
                        <input type="text" name="city" id="city" class="form-control" required>
                    </div>

                    <!-- Payment Information -->
                    <br>
                    <h4><b>Payment Information</b></h4>
                    <div class="form-group">
                        <label class="form-label" for="card_name">Cardholder Name</label>
                        <input type="text" name="card_name" id="card_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="card_number">Card Number</label>
                        <input type="text" name="card_number" id="card_number" class="form-control" required>
                    </div>

                    <!-- Additional Information -->
                    <br>
                    <h4><b>Additional Information</b></h4>
                    <div class="form-group">
                        <label class="form-label" for="country">Country</label>
                        <select name="country" id="country" class="form-control" required>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Canada">Canada</option>
                            <option value="China">China</option>
                            <option value="Egypt">Egypt</option>
                            <option value="France">France</option>
                            <option value="Germany">Germany</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Italy">Italy</option>
                            <option value="Japan">Japan</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Russia">Russia</option>
                            <option value="Spain">Spain</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Turkey">Turkey</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="Vietnam">Vietnam</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="zip">ZIP/Postal Code</label>
                        <input type="text" name="zip" id="zip" class="form-control" required>
                    </div>

                    <br><br>
                    <div class="d-flex justify-content-end">
                        <a href="/cart"><button type="button" class="btn btn-cancel mr-3">Cancel</button></a>
                        <button type="submit" class="btn btn-place-order">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <br>
    </div>
    @include('components.navbar.footer')
@endsection
