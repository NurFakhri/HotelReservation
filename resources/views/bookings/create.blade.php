<!-- resources/views/bookings/create.blade.php -->

@extends('layouts.adminapp')

@section('title', 'Add Booking')

@section('content')
<div class="container">
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

                <div class="card-body">
                    <form method="POST" action="{{ route('bookings.store') }}">
                        @csrf

                        <!-- Pilih Kamar -->
                        <div class="form-group row">
                            <label for="room_id" class="col-md-4 col-form-label text-md-right">{{ __('Select Room') }}</label>

                            <div class="col-md-6">
                                <select id="room_id" class="form-control" name="room_id" required>
                                    <option value="" disabled selected>Choose Room</option>
                                    @foreach($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Tanggal Check-in -->
                        <div class="form-group row">
                            <label for="check_in_date" class="col-md-4 col-form-label text-md-right">{{ __('Check-in Date') }}</label>

                            <div class="col-md-6">
                                <input id="check_in_date" type="date" class="form-control" name="check_in_date" required>
                            </div>
                        </div>

                        <!-- Tanggal Check-out -->
                        <div class="form-group row">
                            <label for="check_out_date" class="col-md-4 col-form-label text-md-right">{{ __('Check-out Date') }}</label>

                            <div class="col-md-6">
                                <input id="check_out_date" type="date" class="form-control" name="check_out_date" required>
                            </div>
                            @error('check_out_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tombol Submit -->
                        <div class="form-group row mb-0">
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