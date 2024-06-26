<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\CategoryLogs;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Obtener todos los productos
        $categories = Category::where('deleted', false)->paginate(4);

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

        $category = Category::create($request->all());

        // Registrar la acción de creación en el log
        CategoryLogs::createLog($category->id, auth()->user()->id, 'created', 'Category created');

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

        $oldName = $category->name;

        $category->update($request->all());

        $newName = $category->name;

        if ($oldName !== $newName) {
            $description = "Category name updated from '{$oldName}' to '{$newName}'";
        } else {
            $description = "Category updated";
        }


        // Registrar la acción de actualización en el log
        CategoryLogs::createLog($id, auth()->user()->id, 'updated', $description);

        return redirect()->route('categories.index')->with('success','The Category have been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {

        $category = Category::where('id', $id)->first();
        $category->deleted = 1;
        $category->save();


        // Registrar la acción de eliminación en el log
        CategoryLogs::createLog($id, auth()->user()->id, 'deleted', 'Category deleted');

        return redirect()->route('categories.index')->with('success','The Category have been successfully deleted!');
    }

    public function logs()
    {
        $logs = CategoryLogs::all();
        return view('categories.logs', compact('logs'));
    }

    public function search(Request $request)
    {
        $search_text = $request->query('query');;
        $categories = Category::where('name','LIKE', '%' . $search_text . '%')
        ->paginate(3);

        $categories->appends(['query' => $search_text]);

        return view('categories.search',compact('categories'));
    }

    public function filter(Request $request){
        $startDate=$request->input('start_date');
        $endDate=$request->input('end_date');

        $categories = Category::whereBetween('created_at', [$startDate, $endDate])
                            ->paginate(4);
                            $categories->appends(['start_date' => $startDate])
                                    ->appends(['end_date'=>$endDate]);

        return view('categories.index',compact('categories'));
    }

}
