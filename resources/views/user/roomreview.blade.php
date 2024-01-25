@extends('layouts.userapp')

@section('title', 'Room Review')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Room Review Form') }}</div>

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
                    <form method="POST" action="{{ route('user.roomreview.store', ['room_id' => $rooms->id]) }}">
                        @csrf

                        <!-- Hidden Input for Room ID -->
                        <input type="hidden" name="room_id" value="{{ $rooms->id }}">

                        <!-- Rating -->
                        <div class="form-group row">
                            <label for="rating" class="col-md-4 col-form-label text-md-right">{{ __('Rating') }}</label>
                            <div class="col-md-6">
                                <select id="rating" class="form-control" name="rating" required style="margin-bottom: 20px;">
                                    <option value="" disabled selected>Choose Rate</option>
                                    <option value="1">1 - Poor</option>
                                    <option value="2">2 - Fair</option>
                                    <option value="3">3 - Average</option>
                                    <option value="4">4 - Good</option>
                                    <option value="5">5 - Excellent</option>
                                </select>
                            </div>
                        </div>


                        <!-- Comment -->
                        <div class="form-group row">
                            <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>
                            <div class="col-md-6">
                                <textarea id="comment" class="form-control mb-5" name="comment" required></textarea>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Review') }}
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