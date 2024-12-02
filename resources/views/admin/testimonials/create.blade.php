@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            Add New Testimonial
        </div>

        <div class="card-body">
            <form action="{{ route('admin.testimonials.store') }}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="section_id">Section</label>
                    <select name="section_id" id="section_id" class="form-control">
                        <option value="" disabled selected>Select Section</option>
                        @foreach($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </select>
                    @error('section_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="c_name">Client Name</label>
                    <input type="text" name="c_name" id="c_name" class="form-control" value="{{ old('c_name') }}">
                    @error('c_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="c_title">Client Title</label>
                    <input type="text" name="c_title" id="c_title" class="form-control" value="{{ old('c_title') }}">
                    @error('c_title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="c_quotes">Client Quotes</label>
                    <textarea name="c_quotes" id="c_quotes" class="form-control">{{ old('c_quotes') }}</textarea>
                    @error('c_quotes')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="icons">Client Profile</label>
                    <input type="file" type="file" name="icons" id="icons" class="form-control" required>
                    @error('icons')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
