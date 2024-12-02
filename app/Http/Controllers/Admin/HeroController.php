<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hero;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class HeroController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('home_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $heroes = Hero::with('section')->get();

        return view('admin.heroes.index', compact('heroes'));
    }

    public function create()
    {
        abort_if(Gate::denies('home_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::all();
        return view('admin.heroes.create', compact('sections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'section_id' => 'required|exists:sections,id',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);
    
        // Handle image upload if present
        $imagePath = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('heroes', 'public');
        }
    
        Hero::create([
            'section_id' => $request->section_id,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'image' => $imagePath, 
        ]);
    
        return redirect()->route('admin.heroes.index')->with('success', 'Hero created successfully.');
    }


    public function edit(Hero $hero)
    {
        abort_if(Gate::denies('home_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::all();
        return view('admin.heroes.edit', compact('hero', 'sections'));
    }

    public function update(Request $request, Hero $hero)
    {
        $request->validate([
            'section_id' => 'required|exists:sections,id',
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $hero->update([
            'section_id' => $request->section_id,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'image' => $request->file('image') ? $request->file('image')->store('images') : $hero->image,
        ]);

        return redirect()->route('admin.heroes.index')->with('success', 'Hero updated successfully.');
    }

    public function show(Hero $hero)
    {
        abort_if(Gate::denies('home_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.heroes.show', compact('hero'));
    }

    public function destroy(Hero $hero)
    {
        abort_if(Gate::denies('home_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hero->delete();

        return back()->with('success', 'Hero deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:heroes,id',
        ]);

        Hero::whereIn('id', $request->ids)->delete();

        return response()->json(['message' => 'Selected heroes deleted successfully.'], Response::HTTP_NO_CONTENT);
    }
}
