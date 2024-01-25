<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }

    public function showroom()
    {
        $rooms = Room::paginate(6);

        return view('user.roominfo', compact('rooms'));
    }


    public function show($room_id)
    {
        $rooms = Room::findOrFail($room_id);
        $reviews = Review::where('room_id', $room_id)->get();

        return view('user.roomdetail', compact('rooms', 'reviews'));
    }

    public function usercreate($room_id)
    {
        $room = Room::findOrFail($room_id);
        return view('user.roombooking', compact('room'));
    }

    public function userstore(Request $request)
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

        return redirect('/user/room')->with('success', 'Booking has been successfully submitted.');
    }

    public function userBookings()
    {
        $user = Auth::user();
        $bookings = Booking::where('user_id', $user->id)->get();

        return view('user.roomuser', compact('bookings'));
    }
}
