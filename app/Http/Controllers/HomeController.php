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
        // Fetch the 6 most recent available rooms to ensure new updates are visible
        $featuredRooms = Room::where('is_available', true)
            ->latest()
            ->take(6)
            ->get();

        return view('home', compact('featuredRooms'));
    }
}
