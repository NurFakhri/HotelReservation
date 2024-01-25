@extends('layouts.userapp')

@section('title', 'Home')

@section('content')
<header class="section__container header__container">
    <div class="header__image__container" src="{{ asset('assets/img/cover.jpg') }}">
        <div class="header__content">
            <h1 class="display-3">Enjoy Your Dream Vacation</h1>
            <p class="lead">Book Hotels, and stay packages at the lowest price.</p>
        </div>
        <div class="booking__container">
            <form>
                <div class="form-group">
                    <div class="input__group">
                        <input type="text" class="form-control" />
                        <label>Check In</label>
                    </div>
                    <p>Add date</p>
                </div>
                <div class="form-group">
                    <div class="input__group">
                        <input type="text" class="form-control" />
                        <label>Check Out</label>
                    </div>
                    <p>Add date</p>
                </div>
                <div class="form-group">
                    <div class="input__group">
                        <input type="number" class="form-control" />
                        <label>Guest</label>
                    </div>
                    <p>Guest</p>
                </div>
            </form>
            <button class="btn btn-primary buttonsearch"><i class="ri-search-line"></i>search</button>
        </div>
    </div>
</header>

<section class="about">
    <div class="section__container">
        <h2 class="text-center" style="margin-top: -45px; margin-bottom: 40px;">About Us</h2>
        <div class="about__content">
            <div class="about__image">
                <img src="{{ asset('image-room/2024-01-09hotel1.jpg') }}" alt="About Image" class="img-fluid" />
            </div>
            <div class="about__text">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <p>
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="about">
    <div class="section__container">
        <h2 class="text-center" style="margin-top: -45px; margin-bottom: 40px;">Our Room</h2>
        <div class="about__content">
            <div class="about__text">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <p>
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
            <div class="about__image">
                <img src="{{ asset('image-room/2024-01-09hotel2.jpg') }}" alt="About Image" class="img-fluid" />
            </div>
        </div>
    </div>
</section>

<section class="section__container">
    <div class="reward__container">
        <p>100+ discount codes</p>
        <h4>Join rewards and discover amazing discounts on your booking</h4>
        <button class="reward__btn btn btn-primary">Join Rewards</button>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
<style>
    .about {
        background-color: #f8f9fa;
        padding: 60px 0;
    }

    .about__content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .about__image img {
        width: 600px;
        height: auto;
        height: auto;
        margin-right: 20px;
        border-radius: 20px;
    }

    .about__text {
        max-width: 500px;
    }
</style>