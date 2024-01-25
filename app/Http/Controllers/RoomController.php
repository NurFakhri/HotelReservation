<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function show($id)
    {
        $room = Room::findOrFail($id); 

        return view('rooms.show', compact('room'));
    }

    public function create()
    {
        $roomTypes = RoomType::all();
        return view('rooms.create', compact('roomTypes'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the request data
            $validatedData = $this->validateRoom($request);

            // Upload and save the image, and get the file name
            $filename = $this->uploadImage($request->file('image'));

            // Save the data to the database with the image file name
            $validatedData['image'] = $filename;
            Room::create($validatedData);

            return redirect()->route('rooms.index')->with('success', 'Room Successfully Added.');
        } catch (ValidationException $e) {
            return redirect()->route('rooms.create')
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            // Handle other exceptions if needed
            return redirect()->route('rooms.create')->with('error', 'An Error Occurred. Please Try Again.');
        }
    }

    protected function validateRoom(Request $request)
    {
        $roomId = $request->route('id'); // Mendapatkan nilai 'id' dari URL

        return $request->validate([
            'room_number' => [
                'required',
                Rule::unique('rooms')->ignore($roomId), // Menambahkan aturan unik, tetapi mengabaikan nomor kamar yang sedang diedit
            ],
            'type' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048', // Dijadikan nullable karena di halaman edit gambar bisa tidak diubah
            'status' => 'required',
        ]);
    }

    protected function uploadImage($image)
    {
        // Generate a unique filename based on the current date and original filename
        $filename = date('Y-m-d') . $image->getClientOriginalName();

        // Move the image to the storage directory
        $image->move(public_path('image-room'), $filename);

        return $filename;
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $roomTypes = RoomType::all();
        return view('rooms.edit', compact('room', 'roomTypes'));
    }

    public function update(Request $request, $id)
    {
        try {
            $room = Room::findOrFail($id);

            // Validate the request data
            $validatedData = $this->validateRoom($request);

            // If a new image is uploaded, replace the existing image
            if ($request->hasFile('image')) {
                $filename = $this->uploadImage($request->file('image'));
                $validatedData['image'] = $filename;

                // Delete the existing image file
                $this->deleteImage($room->image);
            }

            // Update the room data in the database
            $room->update($validatedData);

            return redirect()->route('rooms.index')->with('success', 'Room Successfully Updated.');
        } catch (ValidationException $e) {
            return redirect()->route('rooms.edit', $id)
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            // Handle other exceptions if needed
            return redirect()->route('rooms.edit', $id)->with('error', 'An Error Occurred. Please Try Again.');
        }
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);

        $room->delete();

        return redirect('/rooms')->with('success', 'Room Successfully Deleted.');
    }
}
