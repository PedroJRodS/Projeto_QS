<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Location;
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
        return view('item_create', compact('categories', 'locations'));
    }

    public function store(Request $request)
    {
        $created = $this->item->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'found_date' => $request->input('found_date'),
            'category_id' => $request->input('category_id'),
            'location_id' => $request->input('location_id'),
        ]);
        if ($created) {
            return redirect()->back()->with('message', 'Criado com sucesso');
        }
        return redirect()->back()->with('message', "Error: couldn't create item");
    }

    public function show(Item $item)
    {
        $item = Item::with(['category', 'location'])->findOrFail($item->id);
        return view('item_show', ['item' => $item]);
    }

    public function edit(Item $item)
    {
        $categories = Category::all();
        $locations = Location::all();
        $item = Item::with(['category', 'location'])->findOrFail($item->id);
        return view('item_edit', ['item' => $item], compact('categories', 'locations'));
    }

    public function update(Request $request, string $id)
    {
        $updated = $this->item->where('id', $id)->update($request->except(['_token', '_method']));
        if ($updated) {
            return redirect()->back()->with('message', 'Atualizado com sucesso');
        }
        return redirect()->back()->with('message', "Error: couldn't update item");
    }

    public function destroy(string $id)
    {
        $this->item->where('id', $id)->delete();
        return redirect()->route('items.index')->with('message', 'Item deletado');
    }
}
