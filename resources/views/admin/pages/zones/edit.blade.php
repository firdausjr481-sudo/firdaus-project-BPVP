@extends('admin.master')

@section('content')

<h1>Create Zone</h1>
<hr>
<form action="{{ route('admin.zones.update', $zone) }}" method="PUT" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $zone->name }}" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $zone->description }}</textarea>
    </div>
    <div class="mb-3">
        <label for="price_range" class="form-label">Price Range</label>
        <input type="text" class="form-control" id="price_range" name="price_range" value="{{ $zone->price_range }}" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Zone</button>
</form>


@endsection