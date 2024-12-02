@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Contact
    </div>

    <div class="card-body">
        <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="section_id">Section</label>
                <select name="section_id" id="section_id" class="form-control" required>
                    @foreach($sections as $section)
                        <option value="{{ $section->id }}" {{ $contact->section_id == $section->id ? 'selected' : '' }}>
                            {{ $section->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="contact_info">Contact Info</label>
                <textarea name="contact_info" id="contact_info" class="form-control">{{ $contact->contact_info }}</textarea>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" value="{{ $contact->location }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="phone_number_1">Phone Number 1</label>
                <input type="text" name="phone_number_1" id="phone_number_1" value="{{ $contact->phone_number_1 }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="phone_number_2">Phone Number 2</label>
                <input type="text" name="phone_number_2" id="phone_number_2" value="{{ $contact->phone_number_2 }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="email_address_1">Email Address 1</label>
                <input type="email" name="email_address_1" id="email_address_1" value="{{ $contact->email_address_1 }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="email_address_2">Email Address 2</label>
                <input type="email" name="email_address_2" id="email_address_2" value="{{ $contact->email_address_2 }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
