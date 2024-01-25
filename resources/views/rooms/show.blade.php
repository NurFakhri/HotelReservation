<!-- resources/views/rooms/show.blade.php -->

@extends('layouts.adminapp')

@section('title', 'Room Detail')

@section('content')
    <div class="container">
        <h2>Room Detail</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Room Number: {{ $room->room_number }}</h5>
                <p class="card-text">Type: {{ $room->type }}</p>
                <p class="card-text">Description: {{ $room->description }}</p>
                <p class="card-text">Price: Rp.{{ $room->price }}</p>

                <p class="card-text">Image:
                    @if($room->image)
                        <img src="{{ asset('image-room/' . $room->image) }}" alt="Room Image" style="max-width: 200px; max-height: 200px;">
                    @else
                        N/A
                    @endif
                </p>

                <p class="card-text">Status: {{ $room->status }}</p>
            </div>
        </div>

        <a href="{{ route('rooms.index') }}" class="btn btn-primary mt-3">Back to Room List</a>
    </div>
@endsection
