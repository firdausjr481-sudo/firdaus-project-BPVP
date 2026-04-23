@extends('admin.master')

@section('content')

<div class="container mt-4">
    <div class="card shadow-sm border-0">

        <!-- HEADER -->
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Detail Attraction</h4>
        </div>

        <!-- BODY -->
        <div class="card-body">
            <div class="row">

                <!-- IMAGE -->
                <div class="col-md-5 text-center">
                    @if($attraction->image)
                        <img src="{{ asset('storage/images/' . $attraction->image) }}" 
                             class="img-fluid rounded shadow-sm" 
                             style="max-height: 300px;">
                    @else
                        <div class="text-muted">No Image Available</div>
                    @endif
                </div>

                <!-- DETAIL -->
                <div class="col-md-7">
                    <h3 class="fw-bold">{{ $attraction->name }}</h3>
                    <hr>

                    <p>
                        <strong>Description:</strong><br>
                        <span class="text-muted">{{ $attraction->description }}</span>
                    </p>

                    <p>
                        <strong>Price Range:</strong><br>
                        <span class="badge bg-success">
                            {{ $attraction->price_range }}
                        </span>
                    </p>

                    <!-- BUTTON -->
                    <div class="mt-4 d-flex gap-2">
                        <a href="{{ route('admin.attractions.index') }}" class="btn btn-outline-secondary">
                            Back
                        </a>

                        <a href="{{ route('admin.attractions.edit', $attraction) }}" class="btn btn-warning">
                            Edit
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection