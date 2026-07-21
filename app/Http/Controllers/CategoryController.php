<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::latest('created_at')->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::latest('created_at')->get();
        return view('categories.create', compact('categories'));
    }

    /** 
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(['name' => 'required|string|unique:categories,name|max:255']);
        Category::create(['name' => $request->name]);

        return redirect()->route('categories.index')->with('success', 'New Category Registered');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate(['name' => 'required|string|unique:categories,name|max:255']);
        Category::findOrFail($id)->update(['name' => $request->name]);

        return redirect()->route('categories.index')->with('success', 'Category Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('categories.index')->with('success', 'Category Data Deleted');
    }
}
