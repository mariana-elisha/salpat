<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class RoomController extends Controller
{
    /**
     * Display a listing of available rooms.
     */
    public function index(Request $request)
    {
        $query = Room::where('is_available', true);

        // Filter by check-in and check-out dates if provided
        if ($request->filled('check_in') && $request->filled('check_out')) {
            $checkIn = $request->input('check_in');
            $checkOut = $request->input('check_out');

            // Get all rooms to filter in memory (since logic is in model method)
            $allRooms = $query->get();

            $filteredRooms = $allRooms->filter(function ($room) use ($checkIn, $checkOut) {
                return $room->isAvailableForDates($checkIn, $checkOut);
            });

            // Manually paginate the filtered collection
            $page = Paginator::resolveCurrentPage() ?: 1;
            $perPage = 9;
            $items = $filteredRooms->forPage($page, $perPage);

            $rooms = new LengthAwarePaginator(
                $items,
                $filteredRooms->count(),
                $perPage,
                $page,
                ['path' => Paginator::resolveCurrentPath()]
            );

            $rooms->appends($request->all());
        } else {
            // Standard pagination if no complex filtering is needed
            $rooms = $query->paginate(9);
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
