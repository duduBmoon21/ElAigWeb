@extends('layouts.admin')

@section('content')
    @can('about_create')
        <div class="block my-4">
            <a class="btn-md btn-green" href="{{ route('admin.abouts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.about.title_singular') }}
            </a>
        </div>
    @endcan

    <div class="main-card">
        <div class="header">
            {{ trans('cruds.about.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="body">
            <table class="datatable datatable-About">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('cruds.about.fields.section') }}</th>
                        <th>{{ trans('cruds.about.fields.about_type') }}</th>
                        <th>{{ trans('cruds.about.fields.content') }}</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($abouts as $about)
                        <tr data-entry-id="{{ $about->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $about->section->name }}</td>
                            <td>{{ $about->about_type }}</td>
                            <td>{{ Str::limit($about->content, 50) }}</td>
                            <td>
                                @can('about_show')
                                    <a class="btn-sm btn-indigo" href="{{ route('admin.abouts.show', $about->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('about_edit')
                                    <a class="btn-sm btn-blue" href="{{ route('admin.abouts.edit', $about->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('about_delete')
                                    <form action="{{ route('admin.abouts.destroy', $about->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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


@section('scripts')
    @parent
    <script>
        $(function () {
            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 100,
            });

            let table = $('.datatable-About:not(.ajaxTable)').DataTable();
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
    </script>
@endsection
