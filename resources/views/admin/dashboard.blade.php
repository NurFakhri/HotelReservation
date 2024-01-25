@extends('layouts.adminapp')

@section('title', 'Admin Dashboard')

@section('content')
<div class="row gy-4">
    <!-- Congratulations card -->
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-1">Welcome Back!, {{ Auth::user()->name }} 🎉</h4>
                <p class="pb-0">Best Admin of the month🚀</p>
                <div id="real-time-clock"></div>
            </div>
        </div>
    </div>
    <!--/ Congratulations card -->

    <!-- Transactions -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Hotel Transactions</h5>
                </div>
                <p class="mt-3"><span class="fw-medium">Hotel Transaction Details</span> 😎 this month</p>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-primary rounded shadow">
                                    <i class="mdi mdi-trending-up mdi-24px"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="small mb-1">Booked Room</div>
                                <h5 class="mb-0">{{ count(\App\Models\Booking::all()) }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-success rounded shadow">
                                    <i class="mdi mdi-account-outline mdi-24px"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="small mb-1">Active Customers</div>
                                <h5 class="mb-0">{{ \App\Models\User::where('role', 'user')->count() }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-warning rounded shadow">
                                    <i class="mdi mdi-cellphone-link mdi-24px"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="small mb-1">Average Rating</div>
                                <h5 class="mb-0">
                                    @php
                                    $averageRating = \App\Models\Review::avg('rating');
                                    echo number_format($averageRating, 1);
                                    @endphp
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-info rounded shadow">
                                    <i class="mdi mdi-currency-usd mdi-24px"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="small mb-1">Sales</div>
                                <h5 class="mb-0">{{ \App\Models\Room::sum('price') }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--/ Transactions -->

    <!-- Data Tables -->
    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th class="text-truncate">Id</th>
                            <th class="text-truncate">Name</th>
                            <th class="text-truncate">Email</th>
                            <th class="text-truncate">Role</th>
                            <th class="text-truncate">Join At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        @if($user->role === 'admin')
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--/ Data Tables -->
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        // Format waktu
        var timeString = hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');

        // Memperbarui elemen HTML dengan waktu yang baru
        $('#real-time-clock').text('Current time: ' + timeString);
    }

    // Memperbarui jam setiap detik
    setInterval(updateClock, 1000);

    // Memanggil fungsi updateClock saat halaman dimuat
    $(document).ready(function() {
        updateClock();
    });
</script>
@endsection