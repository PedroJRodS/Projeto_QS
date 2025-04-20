<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public readonly Category $category;
    public readonly Item $item;

    public function __construct()
    {
        $this->category = new Category();
        $this->item = new Item();
    }

    public function create()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect('/');
        }
        return view('category_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $validated['name'],
        ]);

        return redirect()->route('adminPanel')->with('message', 'Categoria cadastrada');
    }

    public function show(Category $category)
    {

        return view('category_show', ['category' => $category]);
    }

    public function destroy(string $id)
    {
        $this->category->where('id', $id)->delete();
        return redirect()->route('adminPanel')->with('message', 'Categoria deletada');
    }
}
