@extends('layouts.admin')

@section('content')
    <div class="main-card">
        <div class="header">
            {{ trans('global.view') }} {{ trans('cruds.hero.title_singular') }}
        </div>

        <div class="body">
            <div class="form-group">
                <label>{{ trans('cruds.hero.fields.section') }}</label>
                <p>{{ $hero->section->name }}</p>
            </div>

            <div class="form-group">
                <label>{{ trans('cruds.hero.fields.title') }}</label>
                <p>{{ $hero->title }}</p>
            </div>

            <div class="form-group">
                <label>{{ trans('cruds.hero.fields.subtitle') }}</label>
                <p>{{ $hero->subtitle }}</p>
            </div>

            <div class="form-group">
                <label>{{ trans('cruds.hero.fields.description') }}</label>
                <p>{{ $hero->description }}</p>
            </div>

            <div class="form-group">
                <label>{{ trans('cruds.hero.fields.image') }}</label>
                @if($hero->image)
                    <img src="{{ asset('storage/' . $hero->image) }}" alt="Hero Image" width="150">
                @endif
            </div>
        </div>
    </div>
@endsection
