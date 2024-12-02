@extends('layouts.admin')

@section('content')
    @can('home_stat_create')
        <div class="block my-4">
            <a class="btn-md btn-green" href="{{ route('admin.hero_stats.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.hero_stat.title_singular') }}
            </a>
        </div>
    @endcan

    <div class="main-card">
        <div class="header">
            {{ trans('cruds.hero_stat.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="body">
            <table class="datatable datatable-HeroStat">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Section</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($heroStats as $heroStat)
                        <tr data-entry-id="{{ $heroStat->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $heroStat->hero->title }}</td>
                            <td>{{ $heroStat->section->name }}</td>
                            <td>{{ $heroStat->title }}</td>
                            <td>{{ Str::limit($heroStat->description, 50) }}</td>
                            <td>
                                @can('home_stat_show')
                                    <a class="btn-sm btn-indigo" href="{{ route('admin.hero_stats.show', $heroStat->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('home_stat_edit')
                                    <a class="btn-sm btn-blue" href="{{ route('admin.hero_stats.edit', $heroStat->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('home_stat_delete')
                                    <form action="{{ route('admin.hero_stats.destroy', $heroStat->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
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
