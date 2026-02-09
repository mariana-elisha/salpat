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
        $featuredRooms = Room::where('is_available', true)
            ->latest()
            ->take(3)
            ->get();

        return view('home', compact('featuredRooms'));
    }
}
