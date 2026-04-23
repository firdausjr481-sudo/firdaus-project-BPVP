@extends('admin.master')

@section('content')

<div class="container mt-4">
    <div class="card shadow-sm border-0">
        
        <!-- HEADER -->
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Attraction</h4>
        </div>

        <!-- BODY -->
        <div class="card-body">
            <form action="{{ route('admin.attractions.update', $attraction) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- NAME -->
                <div class="mb-4">
                    <label for="name" class="form-label fw-semibold">Name</label>
                    <input type="text" class="form-control rounded-3" id="name" name="name"
                        value="{{ $attraction->name }}" required>
                </div>

                <!-- DESCRIPTION -->
                <div class="mb-4">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea class="form-control rounded-3" id="description" name="description" rows="4" required>{{ $attraction->description }}</textarea>
                </div>

                <!-- PRICE -->
                <div class="mb-4">
                    <label for="price_range" class="form-label fw-semibold">Price Range</label>
                    <input type="text" class="form-control rounded-3" id="price_range" name="price_range"
                        value="{{ $attraction->price_range }}" required>
                </div>

                <!-- IMAGE -->
                <div class="mb-4">
                    <label class="form-label fw-semibold">Current Image</label><br>
                    
                    @if($attraction->image)
                        <img src="{{ asset('storage/' . $attraction->image) }}" 
                             class="img-thumbnail mb-3" 
                             style="max-height: 150px;">
                    @else
                        <p class="text-muted">No image uploaded</p>
                    @endif

                    <label for="image" class="form-label fw-semibold mt-2">Change Image</label>
                    <input type="file" class="form-control rounded-3" id="image" name="image">
                </div>

                <!-- BUTTON -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.attractions.index') }}" class="btn btn-outline-secondary">
                        Back
                    </a>
                    <button type="submit" class="btn btn-warning px-4">
                        Update
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection