<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the About Us page.
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Display the Services page.
     */
    public function services()
    {
        return view('pages.services');
    }

    /**
     * Display the Contact Us page.
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Display the Gallery page.
     */
    public function gallery()
    {
        return view('pages.gallery');
    }

    /**
     * Handle contact form submission.
     */
    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        // Save the contact message to database
        ContactMessage::create($validated);

        return redirect()->route('contact')->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}
