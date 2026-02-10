<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomManagementController extends Controller
{
    /**
     * Display a listing of the rooms.
     */
    public function index()
    {
        $rooms = Room::latest()->paginate(10);
        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new room.
     */
    public function create()
    {
        return view('admin.rooms.create');
    }

    /**
     * Store a newly created room in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'price_per_night' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'amenities' => 'nullable|array',
            'is_available' => 'boolean',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('rooms', 'public');
            $data['image'] = $path;
        }

        // Handle amenities (ensure it's stored as array/json if model casts it, 
        // usually standard request array works if cast is 'array' or 'json')
        // The model casts 'amenities' => 'array' (or should).

        $data['is_available'] = $request->has('is_available');

        Room::create($data);

        return redirect()->route('admin.rooms.index')
            ->with('success', 'Room created successfully.');
    }

    /**
     * Show the form for editing the specified room.
     */
    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    /**
     * Update the specified room in storage.
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'price_per_night' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'amenities' => 'nullable|array',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($room->image) {
                Storage::disk('public')->delete($room->image);
            }
            $path = $request->file('image')->store('rooms', 'public');
            $data['image'] = $path;
        }

        $data['is_available'] = $request->has('is_available');

        $room->update($data);

        return redirect()->route('admin.rooms.index')
            ->with('success', 'Room updated successfully.');
    }

    /**
     * Remove the specified room from storage.
     */
    public function destroy(Room $room)
    {
        if ($room->image) {
            Storage::disk('public')->delete($room->image);
        }

        $room->delete();

        return redirect()->route('admin.rooms.index')
            ->with('success', 'Room deleted successfully.');
    }
}
