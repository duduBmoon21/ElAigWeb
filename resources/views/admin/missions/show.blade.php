@extends('layouts.admin')

@section('content')
    <div class="main-card">
        <div class="header">
            {{ trans('global.show') }} {{ trans('cruds.mission.title_singular') }}
        </div>
        <div class="body">
            <div class="form-group">
                <label>{{ trans('cruds.mission.fields.about') }}</label>
                <p>{{ $mission->about ? $mission->about->section_type : 'N/A' }}</p>
            </div>

            <div class="form-group">
                <label>{{ trans('cruds.mission.fields.content') }}</label>
                <p>{{ $mission->content }}</p>
            </div>

            <a href="{{ route('admin.missions.index') }}" class="btn btn-primary">
                {{ trans('global.back') }}
            </a>
        </div>
    </div>
@endsection
