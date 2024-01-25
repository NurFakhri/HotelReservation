<!-- resources/views/bookings/index.blade.php -->

@extends('layouts.adminapp')

@section('title', 'Bookings')

@section('content')
<div class="container">
    <h2>Booking List</h2>

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

    <div class="mb-3">
        <a href="{{ route('bookings.create') }}" class="btn btn-primary">Add Bookings Manually</a>
    </div>

    @if (count($bookings) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Nomor Kamar</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Check-in</th>
                <th>Tanggal Check-out</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                <td>
                    @if($booking->room)
                    {{ $booking->room->room_number }}
                    @else
                    N/A
                    @endif
                </td>
                <td>{{ $booking->user->name }}</td>
                <td>{{ $booking->check_in_date }}</td>
                <td>{{ $booking->check_out_date }}</td>
                <td>
                    @if($booking->status == 'pending')
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning">{{ $booking->status }}</a>
                    @elseif($booking->status == 'confirmed')
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-primary">{{ $booking->status }}</a>
                    @endif
                </td>
                <td>
                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure to Cancel this Booking?')" {{ $booking->status == 'cancelled' ? 'disabled' : '' }}>
                            Cancel
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Tidak ada pemesanan saat ini.</p>
    @endif
</div>
@endsection