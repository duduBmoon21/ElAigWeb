<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pricing;
use App\Models\Section;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PricingController extends Controller
{
    // Index function to list pricing tables
    public function index()
    {
        abort_if(Gate::denies('pricing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pricingTables = Pricing::with(['service', 'section'])->get();
        return view('admin.pricing.index', compact('pricingTables'));
    }

    // Create function to show form for creating a new pricing table
    public function create()
    {
        abort_if(Gate::denies('pricing_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::all();
        $services = Service::all();
        return view('admin.pricing.create', compact('sections', 'services'));
    }

    // Store function to save new pricing table
    public function store(Request $request)
    {
        $request->validate([
            'section_id' => 'required|exists:sections,id',
            'services_id' => 'required|exists:services,id',
            'content' => 'required|string|max:255',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric|min:0|max:100',
        ]);

        Pricing::create([
            'services_id' => $request->services_id,
            'section_id' => $request->section_id,
            'content' => $request->content,
            'price' => $request->price,
            'discount' => $request->discount ?? 0,
        ]);

        return redirect()->route('admin.pricing.index');
    }

    // Show function to display a specific pricing table
    public function show(Pricing $pricingTable)
    {
        abort_if(Gate::denies('pricing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pricingTable->load('service', 'section');
        return view('admin.pricing.show', compact('pricingTable'));
    }

    // Edit function to show the form for editing a pricing table
    public function edit(Pricing  $pricing)
    {
        abort_if(Gate::denies('pricing_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $sections = Section::all();
        $services = Service::all();
        return view('admin.pricing.edit', compact('pricing','sections','services'));
        
    }

    // Update function to update the pricing table in the database
    public function update(Request $request, Pricing $pricingTable)
    {
        $request->validate([
            'section_id' => 'required|exists:sections,id',
            'services_id' => 'required|exists:services,id',
            'content' => 'required|string|max:255',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric|min:0|max:100',
        ]);

        $pricingTable->update([
            'section_id' => $request->section_id,
            'services_id' => $request->services_id,
            'content' => $request->content,
            'price' => $request->price,
            'discount' => $request->discount ?? 0,
        ]);

        return redirect()->route('admin.pricing.index');
    }

    // Destroy function to delete a pricing table
    public function destroy($id)
    {
        abort_if(Gate::denies('pricing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pricingTable = Pricing::findOrFail($id);
        $pricingTable->delete();

        return redirect()->route('admin.pricing.index')->with('success', 'Pricing entry deleted successfully.');
    }

    // Mass destroy function to delete multiple pricing tables at once
    public function massDestroy(Request $request)
    {
        Pricing::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
