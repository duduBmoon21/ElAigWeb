<?php

namespace App\Http\Controllers\Admin;

use App\Models\TermsRule;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TermsRuleController extends Controller
{
    public function index(About $about)
    {
        abort_if(Gate::denies('terms_rule_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $termsRules = $about->termsRules;

        return view('admin.terms_rules.index', compact('termsRules', 'about'));
    }

    public function create(About $about)
    {
        abort_if(Gate::denies('terms_rule_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.terms_rules.create', compact('about'));
    }

    public function store(Request $request, About $about)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        TermsRule::create([
            'content' => $request->content,
            'abouts_id' => $about->id,
        ]);

        return redirect()->route('admin.terms_rules.index', $about);
    }

    public function edit(TermsRule $termsRule)
    {
        abort_if(Gate::denies('terms_rule_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.terms_rules.edit', compact('termsRule'));
    }

    public function update(Request $request, TermsRule $termsRule)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $termsRule->update($request->all());

        return redirect()->route('admin.terms_rules.index', $termsRule->about);
    }

    public function destroy(TermsRule $termsRule)
    {
        abort_if(Gate::denies('terms_rule_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $termsRule->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        TermsRule::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
