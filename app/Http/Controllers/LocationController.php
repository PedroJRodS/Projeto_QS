<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public readonly Location $location;

    public function __construct()
    {
        $this->location = new Location();
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
        $created = $this->location->create([
            'name' => $request->input('name')
        ]);
        if ($created) {
            return redirect()->back()->with('message', 'Criado com sucesso');
        }
        return redirect()->back()->with('message', "Error: couldn't create location");
    }

    public function destroy(string $id)
    {
        $this->location->where('id', $id)->delete();
        return redirect()->route('adminPanel')->with('message', 'Local deletado');
    }
}
