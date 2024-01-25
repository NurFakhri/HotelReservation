<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    public function show($id)
    {
        // Logika untuk menampilkan detail ulasan dengan ID tertentu
    }

    public function create($room_id)
    {
        $rooms = Room::find($room_id);
        return view('user.roomreview', compact('rooms'));
    }

    public function store(Request $request, $room_id)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'room_id' => $room_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('user.roomdetail', ['room_id' => $room_id])
            ->with('success', 'Review has been successfully submitted.');
    }
}
