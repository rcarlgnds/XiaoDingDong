@extends('main')

@section('title', 'Receipt')

@section('body')
    @include('components.navbar.header')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 style="color: #c0392b;">Receipt</h2>
                <p>Transaction ID: ABC123</p>
                <p>Purchased Date: May 16, 2023</p>
                <div class="food-list">
                    <div class="food-item">
                        <img src="food_item1.jpg" alt="Food Item 1" class="food-image">
                        <div class="food-details">
                            <span class="food-name">Food Item 1</span>
                            <span class="food-price">$10.99</span>
                        </div>
                    </div>
                    <div class="food-item">
                        <img src="food_item2.jpg" alt="Food Item 2" class="food-image">
                        <div class="food-details">
                            <span class="food-name">Food Item 2</span>
                            <span class="food-price">$8.99</span>
                        </div>
                    </div>
                    <div class="food-item">
                        <img src="food_item3.jpg" alt="Food Item 3" class="food-image">
                        <div class="food-details">
                            <span class="food-name">Food Item 3</span>
                            <span class="food-price">$12.99</span>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <h4 style="color: #c0392b;">Total Price: $32.97</h4>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal">Confirm</button>
            </div>
        </div>
    </div>

    <!-- Confirm Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirm Receipt</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to confirm the receipt?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    @include('components.navbar.footer')
@endsection
