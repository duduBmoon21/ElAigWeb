<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SectionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('section_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::all();

        return view('admin.sections.index', compact('sections'));
    }

    public function create()
    {
        abort_if(Gate::denies('section_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sections.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:sections,name',
        ]);

        Section::create($request->only(['name']));

        return redirect()->route('admin.sections.index')->with('success', 'Section created successfully.');
    }

    public function edit(Section $section)
    {
        abort_if(Gate::denies('section_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sections.edit', compact('section'));
    }

    public function update(Request $request, Section $section)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:sections,name,' . $section->id,
        ]);

        $section->update($request->only(['name']));

        return redirect()->route('admin.sections.index')->with('success', 'Section updated successfully.');
    }

    public function show(Section $section)
    {
        abort_if(Gate::denies('section_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sections.show', compact('section'));
    }

    public function destroy(Section $section)
    {
        abort_if(Gate::denies('section_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $section->delete();

        return back()->with('success', 'Section deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:sections,id',
        ]);

        Section::whereIn('id', $request->ids)->delete();

        return response()->json(['message' => 'Selected sections deleted successfully.'], Response::HTTP_NO_CONTENT);
    }
}
