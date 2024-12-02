<?php

namespace App\Http\Controllers\Admin;

use App\Models\Goal;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class GoalController extends Controller
{
    public function index(About $about)
    {
        abort_if(Gate::denies('goal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $goals = $about->goals;

        return view('admin.goals.index', compact('goals', 'about'));
    }

    public function create(About $about)
    {
        abort_if(Gate::denies('goal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.goals.create', compact('about'));
    }

    public function store(Request $request, About $about)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Goal::create([
            'content' => $request->content,
            'abouts_id' => $about->id,
        ]);

        return redirect()->route('admin.goals.index', $about);
    }

    public function edit(Goal $goal)
    {
        abort_if(Gate::denies('goal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.goals.edit', compact('goal'));
    }

    public function update(Request $request, Goal $goal)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $goal->update($request->all());

        return redirect()->route('admin.goals.index', $goal->about);
    }

    public function destroy(Goal $goal)
    {
        abort_if(Gate::denies('goal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $goal->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Goal::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
