@extends('layouts.admin')

@section('content')
    <div class="main-card">
        <div class="header">
            {{ trans('cruds.section.title') }}
        </div>

        <div class="body">
            <a href="{{ route('admin.sections.create') }}" class="btn btn-green mb-3">
                {{ trans('global.add') }} {{ trans('cruds.section.title_singular') }}
            </a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ trans('global.id') }}</th>
                        <th>Section(Hero)</th>
                        <th>{{ trans('global.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sections as $section)
                        <tr>
                            <td>{{ $section->id }}</td>
                            <td>{{ $section->name }}</td>
                            <td>
                                <a href="{{ route('admin.sections.edit', $section->id) }}" class="btn btn-sm btn-warning">
                                    {{ trans('global.edit') }}
                                </a>
                                <form action="{{ route('admin.sections.destroy', $section->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ trans('global.areYouSure') }}')">
                                        {{ trans('global.delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
