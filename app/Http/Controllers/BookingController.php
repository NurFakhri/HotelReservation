<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    public function show($id)
    {
        // Logika untuk menampilkan detail pemesanan dengan ID tertentu
    }

    // Metode lain seperti create, store, edit, update, destroy
    public function create()
    {
        $rooms = Room::all();
        return view('bookings.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
        ]);

        Booking::create([
            'room_id' => $request->room_id,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'user_id' => Auth::id(),
        ]);

        return redirect('/bookings')->with('success', 'Booking has been successfully submitted.');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->delete();

        return redirect('/bookings')->with('success', 'Booking Successfully Deleted.');
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);

        return view('bookings.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'status' => 'required|in:pending,confirmed', // Hanya memperbolehkan nilai 'pending' atau 'confirmed'
        ]);

        $booking = Booking::findOrFail($id);

        $booking->update([
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'status' => $request->status,
        ]);

        return redirect('/bookings')->with('success', 'Booking Successfully Updated.');
    }
}
