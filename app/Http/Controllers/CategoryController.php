<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Obtener todos los productos
        $categories = Category::latest()->paginate(4);

        return view('categories.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view(('categories.create'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' =>'required',
            'is_active' => 'required',
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index')->with('success','New Category have been successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener el producto por su ID
        $category = Category::where('id', $id)->first();

        // Pasar los datos del producto a la vista
        return view('categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $category = Category::where('id', $id)->first();
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' =>'required',
            'is_active' => 'required',
        ]);

        $category = Category::where('id', $id)->first();
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success','The Category have been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $category = Category::where('id', $id)->first();
        $category->delete();
        return redirect()->route('categories.index')->with('success','The Category have been successfully deleted!');
    }
}
