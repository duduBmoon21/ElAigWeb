@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            Showroom List
            @can('show_room_create')
                <a href="{{ route('admin.showrooms.create') }}" class="btn btn-success float-right">Add Showroom</a>
            @endcan
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Section</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($showrooms as $showroom)
                            <tr>
                                <td>{{ $showroom->id }}</td>
                                <td>{{ $showroom->section->name ?? 'N/A' }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $showroom->image) }}" alt="Showroom Image" width="80">
                                </td>
                                <td>{{ $showroom->desc }}</td>
                                <td>
                                    @can('show_room_show')
                                        <a class="btn btn-sm btn-info" href="{{ route('admin.showrooms.show', $showroom->id) }}">View</a>
                                    @endcan
                                    @can('show_room_edit')
                                        <a class="btn btn-sm btn-warning" href="{{ route('admin.showrooms.edit', $showroom->id) }}">Edit</a>
                                    @endcan
                                    @can('show_room_delete')
                                        <form action="{{ route('admin.showrooms.destroy', $showroom->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure?');">
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
    </div>
@endsection
