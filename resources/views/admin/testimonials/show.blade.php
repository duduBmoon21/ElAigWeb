@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            Testimonial Details
        </div>

        <div class="card-body">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <td>{{ $testimonial->id }}</td>
                </tr>
                <tr>
                    <th>Section</th>
                    <td>{{ $testimonial->section->name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Client Name</th>
                    <td>{{ $testimonial->c_name }}</td>
                </tr>
                <tr>
                    <th>Client Title</th>
                    <td>{{ $testimonial->c_title }}</td>
                </tr>
                <tr>
                    <th>Client Quotes</th>
                    <td>{{ $testimonial->c_quotes }}</td>
                </tr>
                <tr>
                    <th>Client Profile</th>
                    <td>{{ $testimonial->icons }}</td>
                </tr>
            </table>
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-default">Back to List</a>
        </div>
    </div>
@endsection
