<?php

namespace App\Http\Controllers\Admin;

use App\Models\Summary;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SummaryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('summary_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $summaries = Summary::all();

        return view('admin.summaries.index', compact('summaries'));
    }

    public function create()
    {
        abort_if(Gate::denies('summary_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::all();

        return view('admin.summaries.create', compact('sections'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'section_id' => 'required|exists:sections,id',
            'no_of_clients' => 'nullable|string|max:255',
            'no_of_projects' => 'nullable|string|max:255',
            'employee' => 'nullable|string|max:255',
        ]);

        Summary::create($validatedData);

        return redirect()->route('admin.summaries.index')->with('success', 'Summary created successfully.');
    }

    public function edit(Summary $summary)
    {
        abort_if(Gate::denies('summary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::all();

        return view('admin.summaries.edit', compact('summary', 'sections'));
    }

    public function update(Request $request, Summary $summary)
    {
        $validatedData = $request->validate([
            'section_id' => 'required|exists:sections,id',
            'no_of_clients' => 'nullable|string|max:255',
            'no_of_projects' => 'nullable|string|max:255',
            'employee' => 'nullable|string|max:255',
        ]);

        $summary->update($validatedData);

        return redirect()->route('admin.summaries.index')->with('success', 'Summary updated successfully.');
    }

    public function show(Summary $summary)
    {
        abort_if(Gate::denies('summary_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.summaries.show', compact('summary'));
    }

    public function destroy(Summary $summary)
    {
        abort_if(Gate::denies('summary_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $summary->delete();

        return back()->with('success', 'Summary deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:summaries,id',
        ]);

        Summary::whereIn('id', $request->ids)->delete();

        return response()->json(['message' => 'Selected summaries deleted successfully.'], Response::HTTP_NO_CONTENT);
    }
}
