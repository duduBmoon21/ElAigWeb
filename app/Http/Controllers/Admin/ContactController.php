<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    // List all contacts
    public function index()
    {
        abort_if(Gate::denies('contact_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contacts = Contact::with('section')->get();

        return view('admin.contacts.index', compact('contacts'));
    }

    // Show the form to create a new contact
    public function create()
    {
        abort_if(Gate::denies('contact_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::all(); // Retrieve sections for dropdown
        return view('admin.contacts.create', compact('sections'));
    }

    // Store a newly created contact
    public function store(Request $request)
    {
        $request->validate([
            'section_id' => 'required|exists:sections,id',
            'contact_info' => 'nullable|string|max:500',
            'location' => 'nullable|string|max:255',
            'phone_number_1' => 'nullable|string|max:15',
            'phone_number_2' => 'nullable|string|max:15',
            'email_address_1' => 'nullable|email|max:255',
            'email_address_2' => 'nullable|email|max:255',
        ]);

        Contact::create($request->all());

        return redirect()->route('admin.contacts.index')->with('success', 'Contact created successfully.');
    }

    // Show a single contact
    public function show(Contact $contact)
    {
        abort_if(Gate::denies('contact_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contacts.show', compact('contact'));
    }

    // Show the form to edit a contact
    public function edit(Contact $contact)
    {
        abort_if(Gate::denies('contact_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::all(); // Retrieve sections for dropdown
        return view('admin.contacts.edit', compact('contact', 'sections'));
    }

    // Update an existing contact
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'section_id' => 'required|exists:sections,id',
            'contact_info' => 'nullable|string|max:500',
            'location' => 'nullable|string|max:255',
            'phone_number_1' => 'nullable|string|max:15',
            'phone_number_2' => 'nullable|string|max:15',
            'email_address_1' => 'nullable|email|max:255',
            'email_address_2' => 'nullable|email|max:255',
        ]);

        $contact->update($request->all());

        return redirect()->route('admin.contacts.index')->with('success', 'Contact updated successfully.');
    }

    // Delete a contact
    public function destroy(Contact $contact)
    {
        abort_if(Gate::denies('contact_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
