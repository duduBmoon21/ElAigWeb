@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit Showroom
        </div>

        <div class="card-body">
            <form action="{{ route('admin.showrooms.update', $showroom->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="section_id">Section</label>
                    <select name="section_id" id="section_id" class="form-control">
                        @foreach($sections as $section)
                            <option value="{{ $section->id }}" {{ $showroom->section_id == $section->id ? 'selected' : '' }}>
                                {{ $section->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('section_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <small class="text-muted">Leave empty if you don't want to change the image.</small>
                    @if($showroom->image)
                        <img src="{{ asset('storage/' . $showroom->image) }}" alt="Showroom Image" width="80">
                    @endif
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea name="desc" id="desc" class="form-control">{{ $showroom->desc }}</textarea>
                    @error('desc')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
