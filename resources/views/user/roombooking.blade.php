<!-- resources/views/bookings/create.blade.php -->

@extends('layouts.userapp')

@section('title', 'Booking')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Booking Form') }}</div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="card-body mt-3">
                    <form method="POST" action="{{ route('user.roomstore') }}">
                        @csrf

                        <input type="hidden" name="room_id" value="{{ $room->id }}">

                        <!-- Tanggal Check-in -->
                        <div class="form-group row">
                            <label for="check_in_date" class="col-md-4 col-form-label text-md-right mb-3">{{ __('Check-in Date') }}</label>

                            <div class="col-md-6">
                                <input id="check_in_date" type="date" class="form-control" name="check_in_date" required>
                            </div>
                        </div>

                        <!-- Tanggal Check-out -->
                        <div class="form-group row">
                            <label for="check_out_date" class="col-md-4 col-form-label text-md-right mb-3">{{ __('Check-out Date') }}</label>

                            <div class="col-md-6">
                                <input id="check_out_date" type="date" class="form-control" name="check_out_date" required>
                            </div>
                            @error('check_out_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tombol Submit -->
                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Booking') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection