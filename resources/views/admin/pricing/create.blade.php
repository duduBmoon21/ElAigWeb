@extends('layouts.admin')

@section('content')
    <div class="main-card">
        <div class="header">
            Create Pricing
        </div>
        <div class="body">
            <form action="{{ route('admin.pricing.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="section_id">Section</label>
                    <select name="section_id" id="section_id" class="form-control">
                        <option value="" disabled selected>Select a section</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </select>
                    @error('section_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="services_id">Service</label>
                    <select name="services_id" id="services_id" class="form-control">
                        <option value="" disabled selected>Select a service</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->title }}</option>
                        @endforeach
                    </select>
                    @error('services_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
                    @error('content')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}">
                    @error('price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="discount">Discount (%)</label>
                    <input type="number" name="discount" id="discount" class="form-control" value="{{ old('discount') }}">
                    @error('discount')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('admin.pricing.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
