<?php

namespace App\Http\Controllers\Admin;

use App\Models\ShowRoom;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ShowRoomController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('show_room_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $showrooms = ShowRoom::all();

        return view('admin.show_rooms.index', compact('showrooms'));
    }

    public function create()
    {
        abort_if(Gate::denies('show_room_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::all();

        return view('admin.show_rooms.create', compact('sections'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'section_id' => 'required|exists:sections,id',
            'image' => 'required|image|file|max:2048',
            'desc' => 'nullable|string|max:1000',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('show_rooms', 'public');
        }

        ShowRoom::create($validatedData);

        return redirect()->route('admin.showrooms.index')->with('success', 'ShowRoom created successfully.');
    }

    public function edit(ShowRoom $showRoom)
    {
        abort_if(Gate::denies('show_room_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::all();

        return view('admin.show_rooms.edit', compact('showRoom', 'sections'));
    }

    public function update(Request $request, ShowRoom $showRoom)
    {
        $validatedData = $request->validate([
            'section_id' => 'required|exists:sections,id',
            'image' => 'image|file|max:2048',
            'desc' => 'nullable|string|max:1000',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('show_rooms', 'public');
        }

        $showRoom->update($validatedData);

        return redirect()->route('admin.showrooms.index')->with('success', 'ShowRoom updated successfully.');
    }

    public function show(ShowRoom $showRoom)
    {
        abort_if(Gate::denies('show_room_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.show_rooms.show', compact('showRoom'));
    }

    public function destroy(ShowRoom $showRoom)
    {
        abort_if(Gate::denies('show_room_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $showRoom->delete();

        return back()->with('success', 'ShowRoom deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:show_rooms,id',
        ]);

        ShowRoom::whereIn('id', $request->ids)->delete();

        return response()->json(['message' => 'Selected showrooms deleted successfully.'], Response::HTTP_NO_CONTENT);
    }
}
