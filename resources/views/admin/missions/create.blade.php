@extends('layouts.admin')

@section('content')
    <div class="main-card">
        <div class="header">
            Add Mission
        </div>
        <div class="body">
            <form action="{{ route('admin.missions.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="section_id">Section</label>
                    <select name="section_id" id="section_id" class="form-control">
                        @foreach($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="abouts_id">About</label>
                    <select name="abouts_id" id="abouts_id" class="form-control">
                        @foreach($abouts as $about)
                            <option value="{{ $about->id }}">{{ $about->content }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control" rows="4"></textarea>
                </div>
                <button type="submit" class="btn-md btn-green">Save</button>
            </form>
        </div>
    </div>
@endsection
