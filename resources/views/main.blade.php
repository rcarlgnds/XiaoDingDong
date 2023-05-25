<!doctype html>
<html class="dark" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('color.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

    {{--@yield berguna --}}
    <title>@yield('title')</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@400;700&display=swap');

        body {
            font-family: 'Noto Sans SC', sans-serif;
            font-size: 16px;
            color: #000000; /* Black */
        }

        h3 {
            font-weight: 700;
            color: #c0392b; /* Red */
        }

        .table {
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #000000; /* Black */
            padding: 8px;
        }

        .table th {
            font-weight: 700;
            background-color: #c0392b; /* Red */
            color: #ffffff; /* White */
        }

        .table tbody tr:nth-child(even) {
            background-color: #f7f7f7; /* Light Gray */
        }

        .table tbody tr:hover {
            background-color: #eaeaea; /* Lighter Gray */
        }

        .table p {
            margin: 0;
        }

        .no-transactions {
            text-align: center;
            font-weight: 700;
            color: #c0392b; /* Red */
            margin-top: 20px;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination .page-link {
            color: #000000; /* Black */
        }

        .pagination .page-link:hover {
            color: #c0392b; /* Red */
        }
    </style>

    @yield('styles')
</head>
<body>

@yield('body')
@if($errors->any())
    <div id="warnModal" class="position-absolute start-50 translate-middle z-index-50 p-4 overflow-x-hidden" style="top: 10%; width: 50%;">
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <div class="container">
                <div class="row">
                    <div class="col">
                        {{ $errors->first() }}
                    </div>
                    <div class="col col-sm-2 p-0 text-end">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif(session()->has('success'))
    <div id="successModal" class="position-absolute start-50 translate-middle z-index-50 p-4 overflow-x-hidden" style="top: 10%; width: 50%;">
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="container">
                <div class="row">
                    <div class="col">
                        {{ session('success') }}
                    </div>
                    <div class="col col-sm-2 p-0 text-end">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


</body>
</html>
