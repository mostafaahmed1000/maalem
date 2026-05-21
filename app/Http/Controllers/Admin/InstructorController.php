<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstructorController extends Controller
{
    public function index()
    {
        $instructors = Instructor::latest()->paginate(10);
        return view('admin.instructors.index', compact('instructors'));
    }

    public function create()
    {
        return view('admin.instructors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('instructors'), $filename);
            $validated['image'] = 'instructors/' . $filename;
        }

        Instructor::create($validated);

        return redirect()->route('admin.instructors.index')->with('success', 'Instructor added successfully!');
    }

    public function edit(Instructor $instructor)
    {
        return view('admin.instructors.edit', compact('instructor'));
    }

    public function update(Request $request, Instructor $instructor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($instructor->image && file_exists(public_path($instructor->image))) {
                @unlink(public_path($instructor->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('instructors'), $filename);
            $validated['image'] = 'instructors/' . $filename;
        }

        $instructor->update($validated);

        return redirect()->route('admin.instructors.index')->with('success', 'Instructor updated successfully!');
    }

    public function destroy(Instructor $instructor)
    {
        if ($instructor->image && file_exists(public_path($instructor->image))) {
            @unlink(public_path($instructor->image));
        }
        $instructor->delete();
        return redirect()->route('admin.instructors.index')->with('success', 'Instructor deleted successfully!');
    }
}
