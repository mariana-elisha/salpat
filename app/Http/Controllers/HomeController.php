<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Gallery;
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

        // Exact room types supported at Salpat
        $roomTypes = ['Family', 'Standard', 'Deluxe'];

        // Fetch gallery images for the infinite experience slider
        $galleries = Gallery::latest()->take(10)->get();

        // Fetch the 5 most recent guest feedbacks to show as testimonials
        $testimonials = \App\Models\GuestFeedback::latest()
            ->take(5)
            ->get();

        return view('home', compact('featuredRooms', 'galleries', 'roomTypes', 'testimonials'));
    }
}
