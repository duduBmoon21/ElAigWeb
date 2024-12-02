<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('client_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::all();

        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        abort_if(Gate::denies('client_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::all();

        return view('admin.clients.create', compact('sections'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'section_id' => 'required|exists:sections,id',
            'name' => 'nullable|string|max:255',
            'logo' => 'required|image|file|max:1024',
        ]);

        if ($request->hasFile('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Client::create($validatedData);

        return redirect()->route('admin.clients.index')->with('success', 'Client created successfully.');
    }

    public function edit(Client $client)
    {
        abort_if(Gate::denies('client_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::all();

        return view('admin.clients.edit', compact('client', 'sections'));
    }

    public function update(Request $request, Client $client)
    {
        $validatedData = $request->validate([
            'section_id' => 'required|exists:sections,id',
            'name' => 'nullable|string|max:255',
            'logo' => 'image|file|max:1024',
        ]);

        if ($request->hasFile('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $client->update($validatedData);

        return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully.');
    }

    public function show(Client $client)
    {
        abort_if(Gate::denies('client_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clients.show', compact('client'));
    }

    public function destroy(Client $client)
    {
        abort_if(Gate::denies('client_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client->delete();

        return back()->with('success', 'Client deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:clients,id',
        ]);

        Client::whereIn('id', $request->ids)->delete();

        return response()->json(['message' => 'Selected clients deleted successfully.'], Response::HTTP_NO_CONTENT);
    }
}
