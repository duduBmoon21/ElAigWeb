@extends('layouts.admin')

@section('content')
    @can('about_edit')
        <div class="block my-4">
            <a class="btn-md btn-green" href="{{ route('admin.abouts.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    @endcan

    <div class="main-card">
        <div class="header">
            {{ trans('global.edit') }} {{ trans('cruds.about.title_singular') }}
        </div>

        <div class="body">
            <form method="POST" action="{{ route('admin.abouts.update', $about->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="section_id">{{ trans('cruds.about.fields.section') }}</label>
                    <select class="form-control" name="section_id" id="section_id">
                        @foreach($sections as $section)
                            <option value="{{ $section->id }}" {{ $section->id == $about->section_id ? 'selected' : '' }}>
                                {{ $section->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="about_type">{{ trans('cruds.about.fields.about_type') }}</label>
                    <select class="form-control" name="about_type" id="about_type">
                        <option value="mission" {{ $about->about_type == 'mission' ? 'selected' : '' }}>Mission</option>
                        <option value="vision" {{ $about->about_type == 'vision' ? 'selected' : '' }}>Vision</option>
                        <option value="goals" {{ $about->about_type == 'goals' ? 'selected' : '' }}>Goals</option>
                        <option value="terms_rules" {{ $about->about_type == 'terms_rules' ? 'selected' : '' }}>Terms & Rules</option>
                        <option value="desc" {{ $about->about_type == 'desc' ? 'selected' : '' }}>Description</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="content">{{ trans('cruds.about.fields.content') }}</label>
                    <textarea class="form-control" name="content" id="content" rows="5">{{ old('content', $about->content) }}</textarea>
                </div>

                <button type="submit" class="btn-md btn-green">
                    {{ trans('global.update') }}
                </button>
            </form>
        </div>
    </div>
@endsection
