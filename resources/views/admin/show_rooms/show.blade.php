@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            Showroom Details
        </div>

        <div class="card-body">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <td>{{ $showroom->id }}</td>
                </tr>
                <tr>
                    <th>Section</th>
                    <td>{{ $showroom->section->name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td>
                        <img src="{{ asset('storage/' . $showroom->image) }}" alt="Showroom Image" width="150">
                    </td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $showroom->desc }}</td>
                </tr>
            </table>
            <a href="{{ route('admin.showrooms.index') }}" class="btn btn-default">Back to List</a>
        </div>
    </div>
@endsection
