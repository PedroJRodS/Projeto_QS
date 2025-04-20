<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Category;
use App\Models\Location;
use App\Models\Condition;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public readonly Report $report;

    public function __construct()
    {
        $this->report = new Report();
    }

    public function index()
    {
        $count = Report::count();
        $reports = $this->report->all();
        return view('reports', ['reports' => $reports], compact('count'));
    }

    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();
        $conditions = Condition::all();
        return view('report_create', compact('categories', 'locations', 'conditions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'report_date' => 'required|date',
            'reporter_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'location_id' => 'required|exists:locations,id',
            'condition_id' => 'required|exists:conditions,id',
        ]);

        $created = $this->report->create($validated);

        if ($created) {
            return redirect()->route('reports.index')->with('message', 'Relato criado');
        }

        return redirect()->back()->with('message', "Erro: não foi possível criar o relato.");
    }


    public function show(Report $report)
    {
        $report = Report::with(['category', 'location'])->findOrFail($report->id);
        return view('report_show', ['report' => $report]);
    }

    public function edit(Report $report)
    {
        $categories = Category::all();
        $locations = Location::all();
        $conditions = Condition::all();
        $report = Report::with(['category', 'location', 'condition'])->findOrFail($report->id);
        return view('report_edit', ['report' => $report], compact('categories', 'locations', 'conditions'));
    }

    public function update(Request $request, Report $report)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'report_date' => 'required|date',
            'reporter_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'location_id' => 'required|exists:locations,id',
            'condition_id' => 'required|exists:conditions,id',
        ]);

        $report->update($validated);

        return redirect()->route('reports.index')->with('message', 'Relato atualizado');
    }

    public function destroy(string $id)
    {
        $this->report->where('id', $id)->delete();
        return redirect()->route('reports.index')->with('message', 'Relato deletado');
    }
}
