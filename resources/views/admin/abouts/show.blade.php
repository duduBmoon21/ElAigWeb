@extends('layouts.admin')

@section('content')
    <div class="main-card">
        <div class="header">
            {{ trans('global.view') }} {{ trans('cruds.about.title_singular') }}
        </div>

        <div class="body">
            <p><strong>{{ trans('cruds.about.fields.section') }}:</strong> {{ $about->section->name }}</p>
            <p><strong>{{ trans('cruds.about.fields.about_type') }}:</strong> {{ $about->about_type }}</p>
            <p><strong>{{ trans('cruds.about.fields.content') }}:</strong> {!! $about->content !!}</p>
        </div>
    </div>
@endsection
