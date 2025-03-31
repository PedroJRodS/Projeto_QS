<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Location;

class PainelAdminController extends Controller
{
    public readonly Category $category;
    public readonly Location $location;
    public function __construct()
    {
        $this->category = new Category();
        $this->location = new Location();
    }
    public function index()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect('/');
        }
        // Listing
        $categories = Category::withCount('items', 'reports')->get();
        $locations = Location::withCount('items', 'reports')->get();
        // $locations = $this->location->all();
        // How many cat./loc. are there
        $countCategories = Category::count();
        $countLocations = Location::count();
        return view('adminPanel', ['categories' => $categories, 'locations' => $locations], compact('countCategories', 'countLocations'));
    }
}
