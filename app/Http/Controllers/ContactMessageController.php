<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the contact messages.
     */
    public function index()
    {
        $user = auth()->user();

        // Ensure user has permission
        if (!$user || (!$user->isAdmin() && !$user->isReceptionist() && !$user->isManager())) {
            abort(403, 'Unauthorized.');
        }

        $messages = ContactMessage::latest()->paginate(20);

        return view('contact_messages.index', compact('messages'));
    }
}
