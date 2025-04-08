<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Condition;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    public readonly Condition $condition;

    public function __construct()
    {
        $this->condition = new Condition();
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
        $created = $this->condition->create([
            'name' => $request->input('name')
        ]);
        if ($created) {
            return redirect()->back()->with('message', 'Criado com sucesso');
        }
        return redirect()->back()->with('message', "Error: Estado não pode ser criado");
    }

    public function destroy(string $id)
    {
        $this->condition->where('id', $id)->delete();
        return redirect()->route('adminPanel')->with('message', 'Estado deletado');
    }
}
