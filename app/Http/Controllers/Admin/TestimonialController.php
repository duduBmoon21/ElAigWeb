<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TestimonialController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('testimonial_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testimonials = Testimonial::all();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        abort_if(Gate::denies('testimonial_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::all();

        return view('admin.testimonials.create', compact('sections'));
    }

    public function store(Request $request)
    {
    
    
        $validatedData = $request->validate([
            'section_id' => 'required|exists:sections,id',
             'c_name' => 'nullable|string|max:255',
            'c_title' => 'nullable|string|max:255',
            'c_quotes' => 'nullable|string|max:1000',
            'icons' => 'image|file|max:1024',
        ]);
    
        // Handle file upload
        if ($request->hasFile('icons') && $request->file('icons')->isValid()) {
            // Store the image in the 'public/icons' directory
            $imagePath = $request->file('icons')->store('icons', 'public');
            $validatedData['icons'] = $imagePath; // Store the relative path in the database
        }
    
        // Create the service with the uploaded image path
        Testimonial::create($validatedData);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        abort_if(Gate::denies('testimonial_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::all();

        return view('admin.testimonials.edit', compact('testimonial', 'sections'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validatedData = $request->validate([
            'section_id' => 'required|exists:sections,id',
            'c_name' => 'nullable|string|max:255',
           'c_title' => 'nullable|string|max:255',
           'c_quotes' => 'nullable|string|max:1000',
           'icons' => 'image|file|max:1024',
        ]);

        $testimonial->update($validatedData);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function show(Testimonial $testimonial)
    {
        abort_if(Gate::denies('testimonial_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.testimonials.show', compact('testimonial'));
    }

    public function destroy(Testimonial $testimonial)
    {
        abort_if(Gate::denies('testimonial_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testimonial->delete();

        return back()->with('success', 'Testimonial deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:testimonials,id',
        ]);

        Testimonial::whereIn('id', $request->ids)->delete();

        return response()->json(['message' => 'Selected testimonials deleted successfully.'], Response::HTTP_NO_CONTENT);
    }
}
