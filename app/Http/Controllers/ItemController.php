<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Location;
use App\Models\Condition;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public readonly Item $item;

    public function __construct()
    {
        $this->item = new Item();
    }

    public function index()
    {
        $count = Item::count();
        $lostItems = Item::where('status', 'Perdido')->get();
        $returnedItems = Item::where('status', 'Devolvido')->get();
        return view('items', compact('lostItems', 'returnedItems', 'count'));
    }

    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();
        $conditions = Condition::all();
        return view('item_create', compact('categories', 'locations', 'conditions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'found_date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'location_id' => 'required|exists:locations,id',
            'condition_id' => 'required|exists:conditions,id',
            'status' => 'required|string|in:Perdido,Encontrado',
        ]);

        Item::create($validated);

        return redirect()->route('items.index')->with('message', 'Item cadastrado');
    }


    public function show(Item $item)
    {
        $item = Item::with(['category', 'location', 'condition'])->findOrFail($item->id);
        return view('item_show', ['item' => $item]);
    }

    public function edit(Item $item)
    {
        $categories = Category::all();
        $locations = Location::all();
        $conditions = Condition::all();
        $item = Item::with(['category', 'location', 'condition'])->findOrFail($item->id);
        return view('item_edit', ['item' => $item], compact('categories', 'locations', 'conditions'));
    }

    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'found_date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'location_id' => 'required|exists:locations,id',
            'condition_id' => 'required|exists:conditions,id',
            'status' => 'required|in:Perdido,Devolvido',
            'returned_date' => 'nullable|date',
            'returned_to' => 'nullable|string|max:255',
        ]);

        $item->update($validated);

        return redirect()->route('items.index')->with('message', 'Item atualizado');
    }


    public function destroy(string $id)
    {
        $this->item->where('id', $id)->delete();
        return redirect()->route('items.index')->with('message', 'Item deletado');
    }
}
