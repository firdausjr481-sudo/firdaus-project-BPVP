@extends('admin.master')

@section('content')

<div class="container mt-4">
    <div class="card shadow-sm border-0">
        
        <!-- HEADER -->
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Create Zone</h4>
        </div>

        <!-- BODY -->
        <div class="card-body">
            <form action="{{ route('admin.zones.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- NAME -->
                <div class="mb-4">
                    <label for="name" class="form-label fw-semibold">Name</label>
                    <input type="text" class="form-control rounded-3" id="name" name="name" placeholder="Enter zone name" required>
                </div>

                <!-- DESCRIPTION -->
                <div class="mb-4">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea class="form-control rounded-3" id="description" name="description" rows="4" placeholder="Enter description" required></textarea>
                </div>

                <!-- PRICE -->
                <div class="mb-4">
                    <label for="price_range" class="form-label fw-semibold">Price Range</label>
                    <input type="text" class="form-control rounded-3" id="price_range" name="price_range" placeholder="Example: Rp 10.000 - Rp 50.000" required>
                </div>

                <!-- IMAGE -->
                <div class="mb-4">
                    <label for="image" class="form-label fw-semibold">Image</label>
                    <input type="file" class="form-control rounded-3" id="image" name="image" required>
                </div>

                <!-- BUTTON -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.zones.index') }}" class="btn btn-outline-secondary">
                        Back
                    </a>
                    <button type="submit" class="btn btn-primary px-4">
                        Save
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection