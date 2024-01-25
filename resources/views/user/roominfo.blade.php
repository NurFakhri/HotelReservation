@extends('layouts.userapp')

@section('title', 'Room Information')

@section('content')
<section class="section__container popular__container" style="margin-top: -100px; margin-bottom: -50px;">
  <div class="popular__grid">
    @foreach ($rooms as $room)
    <div class="popular__card position-relative">
      <a href="{{ route('user.roomdetail', ['room_id' => $room->id]) }}">
        <img src="{{ asset('image-room/' . $room->image) }}" alt="popular hotel" class="room-image" />
      </a>
      <div class="popular__content">
        <div class="popular__card__header d-flex justify-content-between align-items-center">
          <h4>Room: {{ $room->room_number }}</h4>
          <h4>Rp. {{ $room->price }}</h4>
        </div>
        <p>Type: {{ $room->type == 1 ? 'Royale' : ($room->type == 2 ? 'Platinum' : 'Unknown') }}</p>
      </div>
    </div>
    @endforeach
  </div>

  <!-- Tambahkan tag paginasi di bagian bawah -->
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item">
        <a class="page-link" href="room?page=1" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <li class="page-item"><a class="page-link" href="/user/room?page=1">1</a></li>
      <li class="page-item"><a class="page-link" href="/user/room?page=2">2</a></li>
      <li class="page-item"><a class="page-link" href="/user/room?page=3">3</a></li>
      <li class="page-item">
        <a class="page-link" href="/user/room?page=2" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>

</section>

<style>
  .room-image {
    width: 100%;
    /* Sesuaikan dengan lebar yang diinginkan */
    height: 200px;
    /* Sesuaikan dengan tinggi yang diinginkan */
    object-fit: cover;
    /* Menjaga aspek ratio dan mengisi container */
  }
</style>
@endsection