@extends('main')

@section('title', 'Transaction History')

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
        .table{
            background-color: #eaeaea;
        }
    </style>
    <div class="container">
        <br>
        <h3>Transaction History</h3>
        @if ($transactions->isEmpty())
            <br><br><br><br><br><br>
            <h4 class="no-transactions">No transactions yet</h4>
            <br><br><br><br><br><br><br><br><br>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Purchase Date</th>
                    <th>Food Name</th>
                    <th>Total Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($transactions as $transaction)
                    @php
                        $totalPrice = 0;
                    @endphp
                    <tr>
                        <td>{{ $transaction->TransactionID }}</td>
                        <td>{{ $transaction->TransactionDate }}</td>
                        <td>
                            @foreach ($transaction->transactionDetail as $detail)
                                <p>{{ $detail->food->FoodName }} [x{{ $detail->Quantity }}]</p>
                                @php
                                    $totalPrice += $detail->Quantity * $detail->food->FoodPrice;
                                @endphp
                            @endforeach
                        </td>
                        <td>${{ $totalPrice }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $transactions->links() }}
        @endif
    </div>

    @include('components.navbar.footer')
@endsection
