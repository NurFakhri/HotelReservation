<!-- resources/views/rooms/index.blade.php -->

@extends('layouts.adminapp')

@section('title', 'Rooms')

@section('content')
<div class="container">
    <h2>Room List</h2>

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
        <a href="{{ route('rooms.create') }}" class="btn btn-primary">Add New Room</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Room Number</th>
                <th>Type</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
            <tr id="room_{{ $room->id }}">
                <td>
                    <a href="{{ route('rooms.show', $room->id) }}">
                        <button type="button" class="btn btn-info">{{ $room->room_number }}</button>
                    </a>
                </td>
                <td>{{ $room->type }}</td>
                <td>{{ \Illuminate\Support\Str::limit($room->description, 7) }}</td>
                <td>Rp.{{ $room->price }}</td>
                <td>
                    @if($room->image)
                    <img src="{{ asset('image-room/' . $room->image) }}" alt="Room Image" style="max-width: 100px; max-height: 100px;">
                    @else
                    N/A
                    @endif
                </td>
                <td>{{ $room->status }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning custom-margin">Edit</a>
                        <form action="{{ route('rooms.destroy', $room->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure to Delete this Room?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
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
