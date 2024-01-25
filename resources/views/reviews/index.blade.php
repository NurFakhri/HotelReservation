<!-- resources/views/rooms/index.blade.php -->

@extends('layouts.adminapp')

@section('title', 'Review')

@section('content')
<div class="container">
    <h2>Review List</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Room</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>Rate At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
            <tr id="review_{{ $review->id }}">
                <td>{{ $review->user->name }}</td>
                <td>{{ $review->room->room_number }}</td>
                <td>{{ $review->rating }}</td>
                <td>{{ $review->comment }}</td>
                <td>{{ $review->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    .custom-margin {
        margin-right: 10px; /* Sesuaikan dengan margin yang Anda inginkan */
    }
</style>

@endsection
