<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Report;
use App\Models\Category;
use App\Models\Location;
use App\Models\Condition;

class DashboardController extends Controller
{
    public readonly Item $item;
    public readonly Report $report;

    public function __construct()
    {
        $this->item = new Item();
        $this->report = new Report();
    }

    public function index()
    {
        $countLostItems = Item::where('status', 'Perdido')->count();
        $countReturnedItems = Item::where('status', 'Devolvido')->count();
        $countReports = Report::count();
        $abril = Item::whereMonth('created_at', 4)
            ->whereYear('created_at', now()->year)
            ->count();
        return view('dashboard', compact('countLostItems', 'countReturnedItems', 'countReports', 'abril'));
    }
}
