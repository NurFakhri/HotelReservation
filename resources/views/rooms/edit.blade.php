<!-- resources/views/rooms/edit.blade.php -->

@extends('layouts.adminapp')

@section('title', 'Edit Room')

@section('content')
<div class="container">
    <h2>Edit Room</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('rooms.update', $room->id) }}" enctype="multipart/form-data" id="roomForm">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="room_number">Room Number:</label>
            <input type="text" name="room_number" class="form-control" value="{{ $room->room_number }}" required>
            @error('room_number')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="type">Type:</label>
            <select name="type" class="form-control" required>
                @foreach ($roomTypes as $roomType)
                <option value="{{ $roomType->id }}" {{ $roomType->id == $room->type ? 'selected' : '' }}>{{ $roomType->name }}</option>
                @endforeach
            </select>
            @error('type')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control">{{ $room->description }}</textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" class="form-control" value="{{ $room->price }}" required>
            @error('price')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Picture:</label>
            @if($room->image)
            <img src="{{ asset('image-room/' . $room->image) }}" alt="Foto Kamar" style="max-width: 250px; max-height: 250px;">
            <br>
            <input type="file" name="image" class="form-control" id="imageInput">
            @else
            <input type="file" name="image" class="form-control" id="imageInput" required>
            @endif
            <span class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</span>
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control" required>
                <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>available</option>
                <option value="booked" {{ $room->status == 'booked' ? 'selected' : '' }}>booked</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save Changed</button>
    </form>
</div>
@endsection