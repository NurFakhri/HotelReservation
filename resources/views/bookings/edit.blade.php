<!-- resources/views/bookings/edit.blade.php -->

@extends('layouts.adminapp')

@section('title', 'Edit Booking')

@section('content')
<div class="container">
    <h2>Edit Booking</h2>

    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="check_in_date" class="form-label">Check-in Date</label>
            <input type="date" class="form-control" id="check_in_date" name="check_in_date" value="{{ $booking->check_in_date }}" required>
        </div>

        <div class="mb-3">
            <label for="check_out_date" class="form-label">Check-out Date</label>
            <input type="date" class="form-control" id="check_out_date" name="check_out_date" value="{{ $booking->check_out_date }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Booking</button>
    </form>
</div>
@endsection
