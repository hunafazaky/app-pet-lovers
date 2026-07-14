<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::with('category', 'user')->where('user_id', Auth::id())->latest()->get();
        $categories = Category::all();

        return view('pets.index', compact('pets', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pets = Pet::with('category', 'user')->where('user_id', Auth::id())->latest()->get();
        $categories = Category::all();

        return view('pets.create', compact('pets', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'age' => 'required|integer|min:0',
            'gender' => 'required|in:Male,Female',
            'condition' => 'required|in:Healthy,Sick',
            'bio' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('avatars/pets', 'public');
        }

        Pet::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'photo' => $photoPath,
            'age' => $request->age,
            'gender' => $request->gender,
            'condition' => $request->condition,
            'bio' => $request->bio,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('pets.index')->with('success', 'New Pet Registered');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pet = Pet::findOrFail($id);
        return view('pets.show', compact('pet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pet = Pet::findOrFail($id);
        $categories = Category::all();

        return view('pets.edit', compact('pet', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pet = Pet::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'age' => 'required|integer|min:0',
            'gender' => 'required|in:Male,Female',
            'condition' => 'required|in:Healthy,Sick',
            'bio' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $photoPath = $pet->photo;
        if ($request->hasFile('photo')) {
            if ($pet->photo && Storage::disk('public')->exists($pet->photo)) {
                Storage::disk('public')->delete($pet->photo);
            }
            $photoPath = $request->file('photo')->store('avatars/pets', 'public');
        }

        Pet::findOrFail($id)->update([
            'name' => $request->name,
            'photo' => $photoPath,
            'age' => $request->age,
            'gender' => $request->gender,
            'condition' => $request->condition,
            'bio' => $request->bio,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('pets.index')->with('success', 'Pet Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pet = Pet::findOrFail($id);

        if ($pet->photo) { 
            Storage::disk('public')->delete($pet->photo); 
        }
        
        $pet->delete();

        return redirect()->route('pets.index')->with('success', 'Pet Data Deleted');
    }
}
