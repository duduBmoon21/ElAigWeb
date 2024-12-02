@extends('layouts.admin')

@section('content')
    <div class="main-card">
        <div class="header">
            {{ trans('cruds.service.edit') }}
        </div>

        <div class="body">
            <form method="POST" action="{{ route('admin.services.update', $service->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="section_id">{{ trans('cruds.service.fields.section') }}</label>
                    <select name="section_id" id="section_id" class="form-control @error('section_id') is-invalid @enderror">
                        @foreach($sections as $section)
                            <option value="{{ $section->id }}" {{ $service->section_id == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
                        @endforeach
                    </select>
                    @error('section_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">{{ trans('cruds.service.fields.title') }}</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $service->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">{{ trans('cruds.service.fields.description') }}</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $service->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="icon">{{ trans('cruds.service.fields.icon') }}</label>
                    <input type="text" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', $service->icon) }}" required>
                    @error('icon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">{{ trans('global.update') }}</button>
            </form>
        </div>
    </div>
@endsection
