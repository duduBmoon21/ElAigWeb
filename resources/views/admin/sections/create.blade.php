@extends('layouts.admin')

@section('content')
    <div class="main-card">
        <div class="header">
            {{ trans('global.create') }} {{ trans('cruds.section.title_singular') }}
        </div>

        <div class="body">
            <form method="POST" action="{{ route('admin.sections.store') }}">
                @csrf

                <div class="form-group">
                    <label for="name">{{ trans('cruds.section.fields.name') }}</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-green" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection