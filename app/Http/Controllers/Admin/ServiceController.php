<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::all();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        abort_if(Gate::denies('service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::all();  

        return view('admin.services.create', compact('sections'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'section_id' => 'required|exists:sections,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'image|file|max:1024',
        ]);
    
        // Handle file upload
        if ($request->hasFile('icon') && $request->file('icon')->isValid()) {
            // Store the image in the 'public/icons' directory
            $imagePath = $request->file('icon')->store('icons', 'public');
            $validatedData['icon'] = $imagePath; // Store the relative path in the database
        }
    
        // Create the service with the uploaded image path
        Service::create($validatedData);
    
        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }
    
    

    public function edit(Service $service)
    {
        abort_if(Gate::denies('service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::all();  // Fetch sections for the select dropdown

        return view('admin.services.edit', compact('service', 'sections'));
    }

    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'section_id' => 'required|exists:sections,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'image|file|max:1024',
        ]);


        if ($request->file('icon')) {
            $validatedData['icon'] = $request->file('icon')->store('post-images');
        }

        $service->update($validatedData);
    

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function show(Service $service)
    {
        abort_if(Gate::denies('service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.services.show', compact('service'));
    }

    public function destroy(Service $service)
    {
        abort_if(Gate::denies('service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $service->delete();

        return back()->with('success', 'Service deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:services,id',
        ]);

        Service::whereIn('id', $request->ids)->delete();

        return response()->json(['message' => 'Selected services deleted successfully.'], Response::HTTP_NO_CONTENT);
    }
}
