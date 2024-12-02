@extends('layouts.admin')

@section('content')
    <div class="main-card">
        <div class="header">
            {{ trans('global.view') }} {{ trans('cruds.hero_stat.title_singular') }}
        </div>

        <div class="body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="hero">{{ trans('cruds.hero_stat.fields.hero') }}</label>
                        <p>{{ $heroStat->hero->title }}</p>
                    </div>

                    <div class="form-group">
                        <label for="section">{{ trans('cruds.hero_stat.fields.section') }}</label>
                        <p>{{ $heroStat->section->name }}</p>
                    </div>

                    <div class="form-group">
                        <label for="icon">{{ trans('cruds.hero_stat.fields.icon') }}</label>
                        <p>{{ $heroStat->icon }}</p>
                    </div>

                    <div class="form-group">
                        <label for="title">{{ trans('cruds.hero_stat.fields.title') }}</label>
                        <p>{{ $heroStat->title }}</p>
                    </div>

                    <div class="form-group">
                        <label for="description">{{ trans('cruds.hero_stat.fields.description') }}</label>
                        <p>{{ $heroStat->description }}</p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <a href="{{ route('admin.hero_stats.index') }}" class="btn btn-secondary">{{ trans('global.back_to_list') }}</a>
            </div>
        </div>
    </div>
@endsection
