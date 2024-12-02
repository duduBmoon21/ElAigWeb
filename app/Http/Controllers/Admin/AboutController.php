<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AboutController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('about_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $abouts = About::all();
        $abouts = About::with('section')->get();

        return view('admin.abouts.index', compact('abouts'));
    }

    public function create()
    {
        abort_if(Gate::denies('about_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::all();
        return view('admin.abouts.create', compact('sections'));
      
    }

    public function store(Request $request)
    {
        $request->validate([
            'section_id' => 'required|exists:sections,id',
            'about_type' => 'required|in:mission,vision,goals,terms_rules,desc',
            'content' => 'required|string',
        ]);

        About::create([
            'section_id' => $request->section_id,
            'about_type' => $request->about_type,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.abouts.index')->with('success', 'About section created successfully.');
    }

    public function edit(About $about)
    {
        abort_if(Gate::denies('about_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $sections = Section::all();
        return view('admin.abouts.edit', compact('about', 'sections'));
        
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'section_id' => 'required|exists:sections,id',
            'about_type' => 'required|in:mission,vision,goals,terms_rules,desc',
            'content' => 'required|string',
        ]);

        $about->update([
            'section_id' => $request->section_id,
            'about_type' => $request->about_type,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.abouts.index')->with('success', 'About section updated successfully.');
    }

    public function show(About $about)
    {
        abort_if(Gate::denies('about_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.abouts.show', compact('about'));
    }

    public function destroy(About $about)
    {
        abort_if(Gate::denies('about_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $about->delete();

        return back()->with('success', 'About section deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:abouts,id',
        ]);

        About::whereIn('id', $request->ids)->delete();

        return response()->json(['message' => 'Selected about sections deleted successfully.'], Response::HTTP_NO_CONTENT);
    }
}
