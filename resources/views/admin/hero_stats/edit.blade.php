@extends('layouts.admin')

@section('content')
    <div class="main-card">
        <div class="header">
            {{ trans('global.edit') }} {{ trans('cruds.hero_stat.title_singular') }}
        </div>

        <div class="body">
            <form action="{{ route('admin.hero_stats.update', $heroStat->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="hero_id">{{ trans('cruds.hero_stat.fields.hero') }}</label>
                    <select name="hero_id" id="hero_id" class="form-control" required>
                        <option value="">Select Hero</option>
                        @foreach($heroes as $hero)
                            <option value="{{ $hero->id }}" {{ $heroStat->hero_id == $hero->id ? 'selected' : '' }}>
                                {{ $hero->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="section_id">{{ trans('cruds.hero_stat.fields.section') }}</label>
                    <select name="section_id" id="section_id" class="form-control" required>
                        <option value="">Select Section</option>
                        @foreach($sections as $section)
                            <option value="{{ $section->id }}" {{ $heroStat->section_id == $section->id ? 'selected' : '' }}>
                                {{ $section->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="icon">{{ trans('cruds.hero_stat.fields.icon') }}</label>
                    <input type="text" name="icon" id="icon" class="form-control" value="{{ $heroStat->icon }}" required>
                </div>

                <div class="form-group">
                    <label for="title">{{ trans('cruds.hero_stat.fields.title') }}</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $heroStat->title }}" required>
                </div>

                <div class="form-group">
                    <label for="description">{{ trans('cruds.hero_stat.fields.description') }}</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required>{{ $heroStat->description }}</textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{ trans('global.save') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
