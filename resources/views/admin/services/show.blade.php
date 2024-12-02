@extends('layouts.admin')

@section('content')
    <div class="main-card">
        <div class="header">
            {{ trans('cruds.service.show') }}
        </div>

        <div class="body">
            <div class="form-group">
                <strong>{{ trans('cruds.service.fields.section') }}:</strong>
                {{ $service->section->name }}
            </div>

            <div class="form-group">
                <strong>{{ trans('cruds.service.fields.title') }}:</strong>
                {{ $service->title }}
            </div>

            <div class="form-group">
                <strong>{{ trans('cruds.service.fields.description') }}:</strong>
                {{ $service->description }}
            </div>

            <div class="form-group">
                <strong>{{ trans('cruds.service.fields.icon') }}:</strong>
                <i class="{{ $service->icon }}"></i>
            </div>

            <div class="form-group">
                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">{{ trans('global.back_to_list') }}</a>
            </div>
        </div>
    </div>
@endsection
