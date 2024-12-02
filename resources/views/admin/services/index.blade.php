@extends('layouts.admin')

@section('content')
    @can('service_create')
        <div class="block my-4">
            <a class="btn-md btn-green" href="{{ route('admin.services.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.service.title_singular') }}
            </a>
        </div>
    @endcan

    <div class="main-card">
        <div class="header">
            {{ trans('cruds.service.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="body">
            <div class="w-full">
                <table class="stripe hover bordered datatable datatable-Service">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Section</th>
                            <th>Service Name</th>
                            <th>Description</th>
                            <th>Icon</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $key => $service)
                            <tr data-entry-id="{{ $service->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $service->section->name }}</td>
                                <td>{{ $service->title }}</td>
                                <td>{{ Str::limit($service->description, 50) }}</td>
                                <td><i class="{{ $service->icon }}"></i></td>
                                <td>
                                    @can('service_show')
                                        <a class="btn-sm btn-indigo" href="{{ route('admin.services.show', $service->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('service_edit')
                                        <a class="btn-sm btn-blue" href="{{ route('admin.services.edit', $service->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('service_delete')
                                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

            let table = $('.datatable-Service:not(.ajaxTable)').DataTable();
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
    </script>
@endsection
