@extends('layouts.admin')

@section('content')
@can('pricing_create')
<div class="block my-4">

    <a href="{{ route('admin.pricing.create') }}"class="btn-md btn-green" >Add Pricing</a>
</div>
@endcan

<div class="main-card">
<div class="header">
                Pricing List
</div>
<div class="body">
                <table class="datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Section</th>
                        <th>Service</th>
                        <th>Content</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pricingTables as $pricingTable)
                        <tr>
                            <td>{{ $pricingTable->id }}</td>
                            <td>{{ $pricingTable->section->name ?? 'N/A' }}</td>
                            <td>{{ $pricingTable->service->title ?? 'N/A' }}</td>
                            <td>{{ $pricingTable->content }}</td>
                            <td>${{ number_format($pricingTable->price, 2) }}</td>
                            <td>{{ $pricingTable->discount }}%</td>
                            <td>
                                @can('pricing_show')
                                    <a href="{{ route('admin.pricing.show', $pricingTable->id) }}" class="btn btn-sm btn-info">View</a>
                                @endcan
                                @can('pricing_edit')
                                    <a href="{{ route('admin.pricing.edit', $pricingTable->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                @endcan
                                @can('pricing_delete')
                                    <form action="{{ route('admin.pricing.destroy', $pricingTable->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No Pricing Available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
