<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Location;
use App\Models\Item;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public readonly Location $location;
    public readonly Item $item;

    public function __construct()
    {
        $this->location = new Location();
        $this->item = new Item();
    }

    public function create()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect('/');
        }
        return view('location_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Location::create([
            'name' => $validated['name'],
        ]);

        return redirect()->route('adminPanel')->with('message', 'Local cadastrado');
    }

    public function destroy(string $id)
    {
        $this->location->where('id', $id)->delete();
        return redirect()->route('adminPanel')->with('message', 'Local deletado');
    }
}
