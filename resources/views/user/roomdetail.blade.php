@extends('layouts.userapp')

@section('title', 'Room Detail')

@section('content')
<section class="section__container" style="margin-top: -100px;">
    <div class="room__detail">
        <img src="{{ asset('image-room/' . $rooms->image) }}" alt="popular hotel" class="room-image" />
        <div class="room__content">
            <h2 class="room-type">Room Code: {{ $rooms->room_number }}</h2>
            <p class="room-type">{{ $rooms->type == 1 ? 'Royale' : ($rooms->type == 2 ? 'Platinum' : 'Unknown') }}</p>
            <p class="room-type"> {{ $rooms->description }}</p>
        </div>
    </div>
</section>

<section class="roominfo">
    <div class="info">
        <h4>Room Information</h4>
        <ul>
            <li>Room Number: {{ $rooms->room_number}}</li>
            <li>Room Type: {{ $rooms->type  }}</li>
            <li>Price: Rp.{{ $rooms->price  }}</li>
            <li>Number of guest: 1-3 Person</li>
        </ul>
    </div>
    <div class="facilities">
        <h4>Room Facilities</h4>
        <ul>
            <li>2 Bed</li>
            <li>Water Heater</li>
            <li>Internet WiFi</li>
            <li>Television</li>
            <li>Free Breakfast</li>
        </ul>
    </div>
</section>

<section class="room-review">
<div class="container button-section mb-5">
        <div class="text-center">
        <a href="{{ route('user.roomreview.create', ['room_id' => $rooms->id]) }}" class="btn btn-primary">Review This Room</a>
        </div>
    </div>
    <div class="head">
        <h4>Room Review</h4>
    </div>
    <div class="review-scroll">
        @if ($reviews->count() > 0)
            @foreach ($reviews as $review)
                <div class="review-box">
                    <div class="reviewer-name">{{ $review->user->name }}</div>
                    <div class="review-rate">Rating: {{ $review->rating }}</div>
                    <div class="review-text">"{{ $review->comment }}"</div>
                </div>
            @endforeach
        @else
            <p>No review to display</p>
        @endif
    </div>
</section>

<section class="button-section">
    <div class="container">
        <div class="text-center">
            <a href="{{ route('user.roombooking', ['room_id' => $rooms->id]) }}" class="btn btn-primary">Book Now</a>
        </div>
    </div>
</section>

<style>
    .section__container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .room__detail {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .room-image {
        width: 1000px;
        height: 600px;
        object-fit: cover;
        margin-bottom: 20px;
        border-radius: 24px;
    }

    .room-type {
        text-align: center;
    }

    .roominfo {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        margin-top: 20px;
    }

    .info,
    .facilities {
        margin: 0 100px;
        margin-bottom: 30px;
    }

    h4 {
        text-align: center;
        /* Pusatkan teks h4 */
    }

    ul {
        list-style: inside;
        padding: 0;
    }

    li {
        margin-bottom: 8px;
        /* Sesuaikan margin sesuai kebutuhan Anda */
    }

    .room-review {
        text-align: center;
        margin-top: 30px;
    }

    .head {
        margin-bottom: 20px;
    }

    .review-scroll {
        display: flex;
        overflow-x: auto;
        margin: 0 auto;
        margin-bottom: 20px;
        max-width: 70%;
        align-items: center;
        justify-content: center;
    }


    .review-box {
        flex: 0 0 auto;
        /* Membuat kotak review tidak mengecil saat ditambahkan data */
        width: 300px;
        margin: 0 10px;
        padding: 10px;
        background-color: #f5f5f5;
        height: 180px;
    }

    .reviewer-name {
        font-weight: bold;
        margin: 7px 8px;
    }

    .review-rate {
        font-weight: 300;
        font-size: 15px;
        margin-bottom: 15px;
    }
</style>
@endsection