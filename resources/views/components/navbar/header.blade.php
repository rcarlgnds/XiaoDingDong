<style>
    /* Font */
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@400;700&display=swap');

    body {
        font-family: 'Noto Sans SC', sans-serif;
        font-size: 16px;
    }

    /* Colors */
    :root {
        --primary-color: #c0392b;  /* Red */
        --secondary-color: #f39c12;  /* Orange */
        --background-color: #f7f7f7;  /* Light Gray */
        --text-color: #fcfdaf; /* Update default text color */
        --text-hover-color: #efd780;
        --navbar-bg-color: #CD2626;
        --dropdown-bg-color: #9e1b08;
    }

    body {
        background-color: var(--background-color);
    }

    .navbar {
        background-color: #9e1b08;
    }

    .navbar-brand {
        font-size: 18px;
        font-weight: 700;
        color: var(--text-color); /* Change text color to white */
    }

    .navbar-brand i,
    .navbar-brand span,
    .navbar-nav .nav-link,
    .nav-item.dropdown .dropdown-toggle {
        color: var(--text-color); /* Change symbol and text color to white */
        transition: color 0.3s ease;
    }

    .navbar-brand i:hover,
    .navbar-brand span:hover,
    .navbar-nav .nav-link:hover,
    .nav-item.dropdown .dropdown-toggle:hover {
        color: var(--text-hover-color); /* Change symbol and text color on hover */
    }

    .navbar-toggler {
        border-color: var(--primary-color);
    }

    .navbar-toggler-icon {
        background-image: url('path/to/your/toggler-icon.png');
    }

    .navbar-nav .nav-link {
        font-size: 16px;
        font-weight: 700;
        color: var(--text-color); /* Update default text color */
    }

    .nav-link.active {
        color: var(--primary-color);
    }

    .dropdown-menu {
        background-color: var(--dropdown-bg-color); /* Change dropdown menu background color to white */
    }

    .dropdown-item {
        font-size: 16px;
        color: var(--text-color); /* Update default text color */
    }

    .dropdown-item:hover,
    .dropdown-item:focus {
        background-color: var(--primary-color);
        color: var(--text-hover-color); /* Change text color when hovered */
    }

    .navbar-nav.ml-auto.pe-5 .nav-link {
        font-size: 16px;
        font-weight: 700;
        color: var(--text-color); /* Update default text color */
    }

    .navbar-nav.ml-auto.pe-5 .rounded-circle {
        border: 2px solid var(--primary-color);
    }
</style>


<nav class="navbar navbar-expand-lg navbar-dark ">
    <div class="container-fluid ">
        <a class="navbar-brand" href="#"><i class="fas fa-utensils"></i> XiAO DiNG DoNG</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">Home</a>
                </li>

                @if(session()->has('user') && session('user')->Role === 'Admin')
                    <li class="nav-item">
                        <a class="nav-link" href="/createFood">Add New Food</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/manageFood">Manage Food</a>
                    </li>
                @endif

                @if(session()->has('user') && session('user')->Role === 'User')
                    <li class="nav-item">
                        <a class="nav-link" href="/searchFood">Search Food</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cart">Cart</a>
                    </li>
                @endif

                <li class="nav-item dropdown">
                </li>
            </ul>
            <ul class="navbar-nav ml-auto pe-5">

                @if (session()->has('user') && Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if(session()->has('user'))
                            Welcome, {{ session('user')->UserName }}
                            <img src={{session('user')->UserProfileImage}} alt="Profile Picture" class="rounded-circle" width="30" height="30">
                            @endif
                        </a>
                        <form method="post" action="/home">
                            @csrf
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                @if(session()->has('user') && session('user')->Role !== 'Admin')
                                    <li><a class="dropdown-item" href="/transactionHistory">Transaction History</a></li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li><button class="dropdown-item" href="">Sign Out</button></li>
                            </ul>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
