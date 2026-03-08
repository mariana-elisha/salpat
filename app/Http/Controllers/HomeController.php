<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index()
    {
        // Try to fetch one of each major requested type
        $types = ['Standard', 'Deluxe', 'Family'];
        $featuredRooms = collect();

        foreach ($types as $type) {
            $room = Room::where('is_available', true)
                ->where('type', 'like', "%$type%")
                ->latest()
                ->first();
            if ($room) {
                $featuredRooms->push($room);
            }
        }

        // Fill up to 3 if some types were missing
        if ($featuredRooms->count() < 3) {
            $existingIds = $featuredRooms->pluck('id')->toArray();
            $fillers = Room::where('is_available', true)
                ->whereNotIn('id', $existingIds)
                ->latest()
                ->take(3 - $featuredRooms->count())
                ->get();
            $featuredRooms = $featuredRooms->concat($fillers);
        }

        return view('home', compact('featuredRooms'));
    }
}
