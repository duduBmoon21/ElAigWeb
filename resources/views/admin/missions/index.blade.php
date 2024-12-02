@extends('layouts.admin')

@section('content')
    @can('mission_create')
        <div class="block my-4">
            <a class="btn-md btn-green" href="{{ route('admin.missions.create') }}">
                {{ trans('global.add') }} Mission
            </a>
        </div>
    @endcan

    <div class="main-card">
        <div class="header">
            Mission List
        </div>
        <div class="body">
            <table class="datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>About Title</th>
                        <th>Section</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($missions as $mission)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mission->about->content ?? 'N/A' }}</td>
                            <td>{{ $mission->section->name ?? 'N/A' }}</td>
                            <td>{{ Str::limit($mission->content, 50) }}</td>
                            <td>
                                @can('mission_show')
                                    <a href="{{ route('admin.missions.show', $mission->id) }}" class="btn-sm btn-indigo">View</a>
                                @endcan
                                @can('mission_edit')
                                    <a href="{{ route('admin.missions.edit', $mission->id) }}" class="btn-sm btn-blue">Edit</a>
                                @endcan
                                @can('mission_delete')
                                    <form action="{{ route('admin.missions.destroy', $mission->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-sm btn-red" type="submit">Delete</button>
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
