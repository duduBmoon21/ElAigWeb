@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            Add New Showroom
        </div>

        <div class="card-body">
            <form action="{{ route('admin.showrooms.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea name="desc" id="desc" class="form-control">{{ old('desc') }}</textarea>
                    @error('desc')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
