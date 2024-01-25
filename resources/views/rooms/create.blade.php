@extends('layouts.adminapp')

@section('title', 'Add Room')

@section('content')
    <div class="container">
        <h2>Create New Room</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('rooms.store') }}" enctype="multipart/form-data" id="roomForm">
            @csrf

            <div class="form-group">
                <label for="room_number">Room Number:</label>
                <input type="text" name="room_number" class="form-control" required>
                @error('room_number')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="type">Type:</label>
                <select name="type" class="form-control" required>
                    @foreach ($roomTypes as $roomType)
                        <option value="{{ $roomType->id }}">{{ $roomType->name }}</option>
                    @endforeach
                </select>
                @error('type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control"></textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" class="form-control" required>
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" class="form-control" id="imageInput" required>
                <span id="imageError" class="text-danger"></span>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" class="form-control" required>
                    <option value="available">available</option>
                    <option value="booked">booked</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">add room</button>
        </form>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#imageInput').on('change', function () {
                    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
                    var inputValue = $(this).val();

                    if (!allowedExtensions.exec(inputValue)) {
                        $('#imageError').text('Hanya file dengan ekstensi .jpg, .jpeg, .png yang diperbolehkan.');
                    } else {
                        $('#imageError').text('');
                    }
                });
            });
        </script>
    </div>
@endsection
