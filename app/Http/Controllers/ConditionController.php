<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Condition;
use App\Models\Item;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    public readonly Condition $condition;
    public readonly Item $item;

    public function __construct()
    {
        $this->condition = new Condition();
        $this->item = new Item();
    }

    public function create()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect('/');
        }
        return view('condition_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Condition::create([
            'name' => $validated['name'],
        ]);

        return redirect()->route('adminPanel')->with('message', 'Estado cadastrado');
    }

    public function destroy(string $id)
    {
        $this->condition->where('id', $id)->delete();
        return redirect()->route('adminPanel')->with('message', 'Estado deletado');
    }
}
