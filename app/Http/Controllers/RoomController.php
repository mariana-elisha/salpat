<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of available rooms.
     */
    public function index(Request $request)
    {
        $rooms = Room::where('is_available', true)->get();

        // Filter by check-in and check-out dates if provided
        if ($request->has('check_in') && $request->has('check_out') && 
            $request->check_in && $request->check_out) {
            $checkIn = $request->input('check_in');
            $checkOut = $request->input('check_out');
            
            $rooms = $rooms->filter(function ($room) use ($checkIn, $checkOut) {
                return $room->isAvailableForDates($checkIn, $checkOut);
            })->values(); // Reset keys after filtering
        }

        return view('rooms.index', compact('rooms'));
    }

    /**
     * Display the specified room.
     */
    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }
}
