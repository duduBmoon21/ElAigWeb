@extends('layouts.admin')

@section('content')
    <div class="main-card">
        <div class="header">
            {{ trans('global.edit') }} {{ trans('cruds.hero.title_singular') }}
        </div>

        <div class="body">
            <form action="{{ route('admin.heroes.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="section_id">{{ trans('cruds.hero.fields.section') }}</label>
                    <select name="section_id" id="section_id" class="form-control" required>
                        <option value="">Select Section</option>
                        @foreach($sections as $section)
                            <option value="{{ $section->id }}" {{ $hero->section_id == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">{{ trans('cruds.hero.fields.title') }}</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $hero->title }}" required>
                </div>

                <div class="form-group">
                    <label for="subtitle">{{ trans('cruds.hero.fields.subtitle') }}</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ $hero->subtitle }}" required>
                </div>

                <div class="form-group">
                    <label for="description">{{ trans('cruds.hero.fields.description') }}</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required>{{ $hero->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">{{ trans('cruds.hero.fields.image') }}</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @if($hero->image)
                        <img src="{{ asset('storage/' . $hero->image) }}" alt="Hero Image" width="150" class="mt-3">
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{ trans('global.save') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
