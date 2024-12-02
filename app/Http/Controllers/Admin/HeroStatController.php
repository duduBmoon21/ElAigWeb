<?php

namespace App\Http\Controllers\Admin;

use App\Models\HeroStat;
use App\Models\Hero;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class HeroStatController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('home_stat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $heroStats = HeroStat::with('hero', 'section')->get();

        return view('admin.hero_stats.index', compact('heroStats'));
    }

    public function create()
    {
        abort_if(Gate::denies('home_stat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $heroes = Hero::all();
        $sections = Section::all();
        return view('admin.hero_stats.create', compact('heroes', 'sections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hero_id' => 'required|exists:heroes,id',
            'section_id' => 'required|exists:sections,id',
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        HeroStat::create([
            'hero_id' => $request->hero_id,
            'section_id' => $request->section_id,
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.hero_stats.index')->with('success', 'Hero stat created successfully.');
    }

    public function edit(HeroStat $heroStat)
    {
        abort_if(Gate::denies('home_stat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $heroes = Hero::all();
        $sections = Section::all();
        return view('admin.hero_stats.edit', compact('heroStat', 'heroes', 'sections'));
    }

    public function update(Request $request, HeroStat $heroStat)
    {
        $request->validate([
            'hero_id' => 'required|exists:heroes,id',
            'section_id' => 'required|exists:sections,id',
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $heroStat->update([
            'hero_id' => $request->hero_id,
            'section_id' => $request->section_id,
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.hero_stats.index')->with('success', 'Hero stat updated successfully.');
    }

    public function show(HeroStat $heroStat)
    {
        abort_if(Gate::denies('home_stat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hero_stats.show', compact('heroStat'));
    }

    public function destroy(HeroStat $heroStat)
    {
        abort_if(Gate::denies('home_stat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $heroStat->delete();

        return back()->with('success', 'Hero stat deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:hero_stats,id',
        ]);

        HeroStat::whereIn('id', $request->ids)->delete();

        return response()->json(['message' => 'Selected hero stats deleted successfully.'], Response::HTTP_NO_CONTENT);
    }
}
