<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'content' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'pet_id' => 'nullable|exists:pets,id',
        ]);

        $pathPhoto = null;

        if ($request->hasFile('photo')) {
            $pathPhoto = $request->file('photo')->store('posts', 'public');
        }

        Post::create([
            'user_id' => $request->user()?->getKey(),
            'title' => $request->input('title', ''),
            'content' => $request->input('content'),
            'pet_id' => $request->input('pet_id'),
            'photo' => $pathPhoto,
        ]);

        return redirect()->route('dashboard')->with('success', 'Postingan berhasil dibuat!');
    }
}