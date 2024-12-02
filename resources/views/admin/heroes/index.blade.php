@extends('layouts.admin')

@section('content')
    @can('home_create')
        <div class="block my-4">
            <a class="btn-md btn-green" href="{{ route('admin.heroes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.hero.title_singular') }}
            </a>
        </div>
    @endcan

    <div class="main-card">
        <div class="header">
            {{ trans('cruds.hero.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="body">
            <table class="datatable datatable-Hero">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($heroes as $hero)
                        <tr data-entry-id="{{ $hero->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $hero->section->name }}</td>
                            <td>{{ $hero->title }}</td>
                            <td>{{ $hero->subtitle }}</td>
                            <td>{{ Str::limit($hero->description, 50) }}</td>
                            <td>
                                @can('home_show')
                                    <a class="btn-sm btn-indigo" href="{{ route('admin.heroes.show', $hero->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('home_edit')
                                    <a class="btn-sm btn-blue" href="{{ route('admin.heroes.edit', $hero->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('home_delete')
                                    <form action="{{ route('admin.heroes.destroy', $hero->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn-sm btn-red" value="{{ trans('global.delete') }}">
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
