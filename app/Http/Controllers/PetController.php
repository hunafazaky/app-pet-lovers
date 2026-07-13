<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\User;
use App\Models\Category;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pets = Pet::with('category')->where('user_id', Auth::id())->latest()->get();
        
        // Ambil semua kategori untuk pilihan di Dropdown Form
        $categories = Category::all();

        // $user = User::where('user_id', Auth::id())->latest()->get();

        return view('pets.index', compact('pets', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //
        $request->validate([
            // 'pet_id' => 'required|exists:pets,id',
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'age' => 'required|integer|min:0',
            'gender' => 'required|in:Male,Female',
            'condition' => 'required|in:Healthy,Sick',
            'bio' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            // Otomatis membuat folder 'avatars/pets' di storage/app/public
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

        return redirect()->route('pets.index')->with('success', 'Peliharaan kesayangan berhasil didaftarkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
