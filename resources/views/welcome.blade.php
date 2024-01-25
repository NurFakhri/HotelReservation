<!-- resources/views/welcome.blade.php -->

@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <!-- Header - set the background image for the header in the line below-->
    <header class="py-5 bg-image-full" style="background-image: url('https://plus.unsplash.com/premium_photo-1682091797376-746281809b6d?w=1200&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjV8fGhvdGVsJTIwbGFuZHNjYXBlJTIwaW1hZ2V8ZW58MHx8MHx8fDA%3D');">
        <div class="text-center my-5">
            <img class="img-fluid rounded-circle mb-4" src="{{ asset('/assets/img/hotel.png') }}" alt="" />
            <h1 class="text-white fs-3 fw-bolder">Welcome to Our Website</h1>
            <p class="text-white-50 mb-0">Explore our amazing features and services.</p>

            @if (Route::has('login'))
                <div class="mt-4">
                    @auth
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    @endif
                </div>
            @endif
        </div>
    </header>

    <!-- Royale Content section-->
    <section class="py-5">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>Royale Class</h2>
                    <img class="img-fluid mb-4" src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Royale Class" />
                    <p class="lead">Description of the Royale room class. This is where you describe the amazing features of the Royale room.</p>
                    <p class="mb-0">Feel the luxury and comfort in our Royale room. Exclusive amenities and breathtaking views await you.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Platinum Content section-->
    <section class="py-5">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>Platinum Class</h2>
                    <img class="img-fluid mb-4" src="https://images.pexels.com/photos/164595/pexels-photo-164595.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Platinum Class" />
                    <p class="lead">Description of the Platinum room class. This is where you describe the amazing features of the Platinum room.</p>
                    <p class="mb-0">Experience the pinnacle of luxury in our Platinum room. Unmatched elegance and top-notch amenities for an unforgettable stay.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
