<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;

class RelatoController extends Controller
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
        return view('report_create', compact('categories', 'locations'));
    }

    public function store(Request $request)
    {
        $created = $this->report->create([
            'item_name' => $request->input('item_name'),
            'description' => $request->input('description'),
            'report_date' => $request->input('report_date'),
            'reporter_name' => $request->input('reporter_name'),
            'category_id' => $request->input('category_id'),
            'location_id' => $request->input('location_id'),
        ]);
        if ($created) {
            return redirect()->back()->with('message', 'Criado com sucesso');
        }
        return redirect()->back()->with('message', "Error: couldn't create report");
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
        $report = Report::with(['category', 'location'])->findOrFail($report->id);
        return view('report_edit', ['report' => $report], compact('categories', 'locations'));
    }

    public function update(Request $request, string $id)
    {
        $updated = $this->report->where('id', $id)->update($request->except(['_token', '_method']));
        if ($updated) {
            return redirect()->back()->with('message', 'Atualizado com sucesso');
        }
        return redirect()->back()->with('message', "Error: couldn't update report");
    }

    public function destroy(string $id)
    {
        $this->report->where('id', $id)->delete();
        return redirect()->route('reports.index')->with('message', 'Relato deletado');
    }
}
