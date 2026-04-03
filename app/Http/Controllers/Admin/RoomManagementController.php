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
            'room_numbers' => 'nullable|string', // Comma separated list for batch creation
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'price_per_night' => 'required|numeric|min:0',
            'resident_price_per_night' => 'nullable|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // Primary Image
            'images.*' => 'nullable|image|max:2048', // Additional Images Array
            'amenities' => 'nullable|array',
            'is_available' => 'boolean',
        ]);

        $data = $request->except(['image', 'images', 'is_available', 'room_numbers']);

        // Handle primary image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('rooms', 'images');
            $data['image'] = $path;
        }

        // Handle multiple images upload
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $file) {
                $imagePaths[] = $file->store('rooms/multiple', 'images');
            }
            $data['images'] = $imagePaths;
        }

        $data['is_available'] = $request->has('is_available');

        // Check for batch creation
        if ($request->filled('room_numbers')) {
            $roomNumbers = array_map('trim', explode(',', $request->room_numbers));
            foreach ($roomNumbers as $number) {
                if (!empty($number)) {
                    $batchData = $data;
                    $batchData['room_number'] = $number;
                    // For batch, we'll append the room number to the name to differentiate
                    $batchData['name'] = $data['name'] . ' - ' . $number;
                    Room::create($batchData);
                }
            }
            $message = count($roomNumbers) . ' rooms created successfully.';
        } else {
            Room::create($data);
            $message = 'Room created successfully.';
        }

        \App\Models\ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'Room(s) Created',
            'description' => "Admin created new room(s): {$request->name}.",
        ]);

        $redirectRoute = auth()->user()->isAdmin() ? 'admin.rooms.index' : (auth()->user()->isManager() ? 'manager.rooms.index' : 'receptionist.rooms.index');

        return redirect()->route($redirectRoute)->with('success', $message);
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
            'room_number' => 'nullable|string|max:50',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'price_per_night' => 'required|numeric|min:0',
            'resident_price_per_night' => 'nullable|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
            'amenities' => 'nullable|array',
        ]);

        $data = $request->except(['image', 'images', 'is_available', 'amenities']);
        $data['is_available'] = $request->has('is_available');
        $data['amenities'] = $request->get('amenities', []);

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($room->image) {
                \Illuminate\Support\Facades\Storage::disk('images')->delete($room->image);
            }
            $path = $request->file('image')->store('rooms', 'images');
            $data['image'] = $path;
        }

        // Handle multiple images upload (append to existing)
        if ($request->hasFile('images')) {
            $imagePaths = $room->images ?? [];
            foreach ($request->file('images') as $file) {
                $imagePaths[] = $file->store('rooms/multiple', 'images');
            }
            $data['images'] = $imagePaths;
        }

        $room->update($data);

        \App\Models\ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'Room Updated',
            'description' => auth()->user()->role . " updated room details: {$room->name}.",
        ]);

        $redirectRoute = auth()->user()->isAdmin() ? 'admin.rooms.index' : (auth()->user()->isManager() ? 'manager.rooms.index' : 'receptionist.rooms.index');

        return redirect()->route($redirectRoute)
            ->with('success', 'Room updated successfully.');
    }

    /**
     * Remove the specified room from storage.
     */
    public function destroy(Room $room)
    {
        if ($room->image) {
            \Illuminate\Support\Facades\Storage::disk('images')->delete($room->image);
        }
        
        if ($room->images) {
            foreach ($room->images as $img) {
                \Illuminate\Support\Facades\Storage::disk('images')->delete($img);
            }
        }

        $roomName = $room->name;
        $room->delete();

        \App\Models\ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'Room Deleted',
            'description' => "Admin deleted room: {$roomName}.",
        ]);

        $redirectRoute = auth()->user()->isAdmin() ? 'admin.rooms.index' : (auth()->user()->isManager() ? 'manager.rooms.index' : 'receptionist.rooms.index');

        return redirect()->route($redirectRoute)
            ->with('success', 'Room deleted successfully.');
    }
    /**
     * Remove an individual image from a room's additional images gallery.
     */
    public function destroyImage(Room $room, Request $request)
    {
        $request->validate([
            'image_path' => 'required|string',
        ]);

        $imagePath = $request->image_path;
        $images = $room->images ?? [];

        if (in_array($imagePath, $images)) {
            // Delete from disk
            \Illuminate\Support\Facades\Storage::disk('images')->delete($imagePath);
            
            // Remove from array and save
            $newImages = array_filter($images, fn($img) => $img !== $imagePath);
            $room->update(['images' => array_values($newImages)]);

            return back()->with('success', 'Image deleted successfully.');
        }

        return back()->with('error', 'Image not found in this room.');
    }
}
