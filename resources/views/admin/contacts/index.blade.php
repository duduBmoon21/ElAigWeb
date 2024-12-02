@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Contacts List
        <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary float-right">Add New Contact</a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Section</th>
                    <th>Contact Info</th>
                    <th>Location</th>
                    <th>Phone Number 1</th>
                    <th>Email 1</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->section->name ?? 'N/A' }}</td>
                        <td>{{ $contact->contact_info }}</td>
                        <td>{{ $contact->location }}</td>
                        <td>{{ $contact->phone_number_1 }}</td>
                        <td>{{ $contact->email_address_1 }}</td>
                        <td>
                            <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('admin.contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
