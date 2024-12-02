@extends('layouts.admin')

@section('content')
    @can('about_create')
        <div class="block my-4">
            <a class="btn-md btn-green" href="{{ route('admin.abouts.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    @endcan

    <div class="main-card">
        <div class="header">
            {{ trans('global.create') }} {{ trans('cruds.about.title_singular') }}
        </div>

        <div class="body">
            <form method="POST" action="{{ route('admin.abouts.store') }}">
                @csrf
                <div class="form-group">
                    <label for="section_id">{{ trans('cruds.about.fields.section') }}</label>
                    <select class="form-control" name="section_id" id="section_id">
                        @foreach($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="about_type">{{ trans('cruds.about.fields.about_type') }}</label>
                    <select class="form-control" name="about_type" id="about_type">
                        <option value="mission">Mission</option>
                        <option value="vision">Vision</option>
                        <option value="goals">Goals</option>
                        <option value="terms_rules">Terms & Rules</option>
                        <option value="desc">Description</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="content">{{ trans('cruds.about.fields.content') }}</label>
                    <textarea class="form-control" name="content" id="content" rows="5">{{ old('content') }}</textarea>
                </div>

                <button type="submit" class="btn-md btn-green">
                    {{ trans('global.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
