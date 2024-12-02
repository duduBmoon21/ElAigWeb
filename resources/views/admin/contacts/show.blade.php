@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Contact Details
    </div>

    <div class="card-body">
        <p><strong>Section:</strong> {{ $contact->section->name ?? 'N/A' }}</p>
        <p><strong>Contact Info:</strong> {{ $contact->contact_info }}</p>
        <p><strong>Location:</strong> {{ $contact->location }}</p>
        <p><strong>Phone Number 1:</strong> {{ $contact->phone_number_1 }}</p>
        <p><strong>Phone Number 2:</strong> {{ $contact->phone_number_2 }}</p>
        <p><strong>Email Address 1:</strong> {{ $contact->email_address_1 }}</p>
        <p><strong>Email Address 2:</strong> {{ $contact->email_address_2 }}</p>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>
@endsection
