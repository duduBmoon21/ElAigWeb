@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            Testimonials List
            @can('testimonial_create')
                <a class="btn btn-primary float-right" href="{{ route('admin.testimonials.create') }}">
                    Add Testimonial
                </a>
            @endcan
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Section</th>
                        <th>Cprofile</th>
                        <th>Client Name</th>
                        <th>Job Position</th>
                        <th>Qoutes</th>
                       
                    </thead>
                    <tbody>
                        @foreach($testimonials as $testimonial)
                            <tr>
                                <td>{{ $testimonial->id }}</td>
                                <td>{{ $testimonial->section->name ?? 'N/A' }}</td>
                                <td>{{ $testimonial->icons }}</td>
                                <td>{{ $testimonial->c_name }}</td>
                                <td>{{ $testimonial->c_title }}</td>
                                <td>{{ $testimonial->c_quotes }}</td>
                                <td>
                                    @can('testimonial_show')
                                        <a class="btn btn-sm btn-info" href="{{ route('admin.testimonials.show', $testimonial->id) }}">
                                            View
                                        </a>
                                    @endcan
                                    @can('testimonial_edit')
                                        <a class="btn btn-sm btn-warning" href="{{ route('admin.testimonials.edit', $testimonial->id) }}">
                                            Edit
                                        </a>
                                    @endcan
                                    @can('testimonial_delete')
                                        <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
    