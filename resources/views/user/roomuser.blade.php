@extends('layouts.userapp')

@section('title', 'Your Bookings')

@section('content')
<div class="container">

    @if (count($bookings) > 0)
    <table class="table" style="text-align: center;">
        <thead>
            <tr>
                <th style="background-color: #f8f9fa;">Name</th>
                <th style="background-color: #f8f9fa;">Nomor Kamar</th>
                <th style="background-color: #f8f9fa;">Booked at</th>
                <th style="background-color: #f8f9fa;">Tanggal Check-in</th>
                <th style="background-color: #f8f9fa;">Tanggal Check-out</th>
                <th style="background-color: #f8f9fa;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                <td>You</td>
                <td>
                    @if($booking->room)
                    {{ $booking->room->room_number }}
                    @else
                    N/A
                    @endif
                </td>
                <td>{{ $booking->created_at }}</td>
                <td>{{ $booking->check_in_date }}</td>
                <td>{{ $booking->check_out_date }}</td>
                <td>
                    @if($booking->status == 'pending')
                    <a class="btn btn-warning">{{ $booking->status }}</a>
                    @elseif($booking->status == 'confirmed')
                    <a class="btn btn-primary">{{ $booking->status }}</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>You don't have any bookings at the moment.</p>
    @endif
</div>
@endsection