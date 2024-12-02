<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Models\Mission;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class MissionController extends Controller
{
    // Show the list of missions
    public function index()
    {
        abort_if(Gate::denies('mission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $missions = Mission::with(['about', 'section'])->get();
        return view('admin.missions.index', compact('missions'));
    }

    // Show the form for creating a new mission
    public function create()
    {
        abort_if(Gate::denies('mission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $sections = Section::all();
        $abouts = About::where('about_type', 'mission')->get(); 
        return view('admin.missions.create', compact('sections', 'abouts'));
    }

    // Store a newly created mission
    public function store(Request $request)
    {
        $request->validate([
            'section_id' => 'required|exists:sections,id',
            'abouts_id' => 'required|exists:abouts,id',
            'content' => 'required|string',
        ]);

        Mission::create([
            'section_id' => $request->section_id,
            'abouts_id' => $request->abouts_id,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.missions.index')->with('success', 'Mission created successfully.');
    }

    // Show the details of a specific mission
    public function show(Mission $mission)
    {
        abort_if(Gate::denies('mission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.missions.show', compact('mission'));
    }

    // Show the form for editing a mission
    public function edit(Mission $mission)
    {
        abort_if(Gate::denies('mission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $sections = Section::all();
        $abouts = About::where('about_type', 'mission')->get();
        return view('admin.missions.edit', compact('mission', 'sections', 'abouts'));
    }

    // Update a specific mission
    public function update(Request $request, Mission $mission)
    {
        $request->validate([
            'section_id' => 'required|exists:sections,id',
            'abouts_id' => 'required|exists:abouts,id',
            'content' => 'required|string',
        ]);

        $mission->update([
            'section_id' => $request->section_id,
            'abouts_id' => $request->abouts_id,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.missions.index')->with('success', 'Mission updated successfully.');
    }

    // Delete a mission
    public function destroy(Mission $mission)
    {
        abort_if(Gate::denies('mission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $mission->delete();
        return redirect()->route('admin.missions.index')->with('success', 'Mission deleted successfully.');
    }
}
