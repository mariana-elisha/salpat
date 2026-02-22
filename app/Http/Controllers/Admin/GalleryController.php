<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::latest()->paginate(10);
        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('gallery', 'public');
            $data['image_path'] = $path;
        }

        $gallery = Gallery::create($data);

        \App\Models\ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'Gallery Item Added',
            'description' => "Admin uploaded a new gallery image: {$gallery->title}.",
        ]);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Image uploaded successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
                Storage::disk('public')->delete($gallery->image_path);
            }

            $path = $request->file('image')->store('gallery', 'public');
            $data['image_path'] = $path;
        }

        $gallery->update($data);

        \App\Models\ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'Gallery Item Updated',
            'description' => "Admin updated gallery image: {$gallery->title}.",
        ]);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Image updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $galleryTitle = $gallery->title;
        $gallery->delete();

        \App\Models\ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'Gallery Item Deleted',
            'description' => "Admin deleted gallery image: {$galleryTitle}.",
        ]);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Image deleted successfully.');
    }
}
