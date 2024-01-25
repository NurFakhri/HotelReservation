<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Your App') ~ Howtel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashuser.css') }}">
    <link rel="icon" href="{{ asset('assets/hotel.ico') }}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{ asset('assets/hotel.ico') }}" type="image/x-icon"/>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container">
            <a class="navbar-brand" href="#">Howtel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.dashboard') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.roominfo') }}">Room</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.roomuser') }}">My Booking</a>
                    </li>
                </ul>
                <a href="{{ route('login') }}">
                    <button class="btn btn-danger">Logout</button>
                </a>
            </div>
        </div>
    </nav>



    <!-- Page Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Footer Content -->
    <footer class="footer mt-5">
        <div class="section__container footer__container">
            <div class="footer__col">
                <h3>Howtel</h3>
                <p>
                    Howtel is a premier hotel  that offers a seamless and
                    convenient way to find and book accommodations worldwide.
                </p>
                <p>
                    With a user-friendly interface and a vast selection of hotels,
                    Howtel aims to provide a stress-free experience for travelers
                    seeking the perfect stay.
                </p>
            </div>
            <div class="footer__col">
                <h4>Company</h4>
                <p>About Us</p>
                <p>Our Team</p>
                <p>Blog</p>
                <p>Book</p>
                <p>Contact Us</p>
            </div>
            <div class="footer__col">
                <h4>Legal</h4>
                <p>FAQs</p>
                <p>Terms & Conditions</p>
                <p>Privacy Policy</p>
            </div>
            <div class="footer__col">
                <h4>Resources</h4>
                <p>Social Media</p>
                <p>Help Center</p>
                <p>Partnerships</p>
            </div>
        </div>
        <div class="footer__bar">
            Copyright © 2024. All rights reserved.
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

    <!-- Add your custom scripts here -->

</body>

</html>