@extends('layouts.admin')

@section('content')
    <div class="main-card">
        <div class="header">
            {{ trans('global.edit') }} {{ trans('cruds.mission.title_singular') }}
        </div>
        <div class="body">
            <form action="{{ route('admin.missions.update', $mission->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="abouts_id">{{ trans('cruds.mission.fields.about') }}</label>
                    <select name="abouts_id" id="abouts_id" class="form-control">
                        <option value="">{{ trans('global.select') }} {{ trans('cruds.about.title_singular') }}</option>
                        @foreach ($abouts as $about)
                            <option value="{{ $about->id }}" {{ $mission->abouts_id == $about->id ? 'selected' : '' }}>
                                {{ $about->section_type }}
                            </option>
                        @endforeach
                    </select>
                    @error('abouts_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content">{{ trans('cruds.mission.fields.content') }}</label>
                    <textarea name="content" id="content" class="form-control">{{ old('content', $mission->content) }}</textarea>
                    @error('content')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">
                    {{ trans('global.update') }}
                </button>
            </form>
        </div>
    </div>
@endsection
