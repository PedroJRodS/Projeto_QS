<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Location;
use App\Models\Condition;

class AdminPanelController extends Controller
{
    public readonly Category $category;
    public readonly Location $location;
    public readonly Condition $condition;
    public function __construct()
    {
        $this->category = new Category();
        $this->location = new Location();
        $this->condition = new Condition();
    }
    public function index()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect('/');
        }
        $categories = Category::withCount('items', 'reports')->get();
        $locations = Location::withCount('items', 'reports')->get();
        $conditions = Condition::withCount('items', 'reports')->get();
        $countCategories = Category::count();
        $countLocations = Location::count();
        $countConditions = Condition::count();
        return view('adminPanel', ['categories' => $categories, 'locations' => $locations, 'conditions' => $conditions], compact('countCategories', 'countLocations', 'countConditions'));
    }
}
