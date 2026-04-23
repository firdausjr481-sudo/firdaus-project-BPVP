@extends('admin.master')

@section('content')
    
<h1>Create Attraction</h1>
<hr>
<form action="{{route('admin.attractions.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-12">
        <label for="zone_id" class="form-label">Zone</label>
        <select id="zone_id" name="zone_id" class="form-control"  required>
            <option value="">Pilih Zone</option>
            @foreach ($zones as $zone)
                <option value="{{ $zone->id }}" {{ old ('zone_id') ==
                $zone->id ? 'selected' : '' }}> 
                    {{ $zone->name }}

                </option>
            @endforeach
    </select>
    @error('zone_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror

    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label for="price_range" class="form-label">Price Range</label>
        <input type="text" class="form-control" id="price_range" name="price_range" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image" required>
    </div>
    <button type="submit" class="btn btn-primary">Create Attraction</button>
</form>
@endsection