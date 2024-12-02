@extends('layouts.admin')

@section('content')
<div class="main-card">
    <div class="header">
        Pricing Details
        <a href="{{ route('admin.pricing.index') }}" class="btn btn-secondary btn-sm float-right">Back to List</a>
    </div>

    <div class="body">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $pricingTable->id }}</td>
            </tr>
            <tr>
                <th>Section</th>
                <td>{{ $pricingTable->section->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Service</th>
                <td>{{ $pricingTable->service->title ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Content</th>
                <td>{{ $pricingTable->content }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>${{ number_format($pricingTable->price, 2) }}</td>
            </tr>
            <tr>
                <th>Discount</th>
                <td>{{ $pricingTable->discount }}%</td>
            </tr>
        </table>
    </div>
</div>
@endsection
