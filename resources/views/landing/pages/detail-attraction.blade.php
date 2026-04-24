@extends('landing.master')

@section('content')

<!-- HERO / HEADER -->
<section class="section-top text-white" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('storage/images/'.$attraction->image) }}') center/cover no-repeat; padding: 100px 0;">
    <div class="container text-center">
        <h1 class="fw-bold">{{ $attraction->name }}</h1>
        <p class="mt-2">{{ $attraction->zone->name ?? 'Tourism Destination' }}</p>
    </div>
</section>

<!-- CONTENT -->
<section class="property_single_details section-padding">
    <div class="container">
        <div class="row">

            <!-- MAIN -->
            <div class="col-lg-8">

                <!-- IMAGE -->
                <div class="mb-4">
                    <img src="{{ asset('storage/images/'.$attraction->image) }}"
                         class="img-fluid rounded-4 shadow w-100"
                         style="max-height: 450px; object-fit: cover;">
                </div>

                <!-- TITLE & DESC -->
                <div class="bg-white p-4 rounded-4 shadow-sm mb-4">
                    <h2 class="fw-bold">{{ $attraction->name }}</h2>
                    <h5 class="text-success mb-3">
                        {{ $attraction->price_range ?: 'Free Entry' }}
                    </h5>

                    <p class="text-muted" style="line-height:1.8;">
                        {{ $attraction->description }}
                    </p>
                </div>

                <!-- REVIEWS -->
                <div class="bg-white p-4 rounded-4 shadow-sm">
                    <h4 class="mb-4">⭐ Visitor Reviews</h4>

                    @forelse($attraction->reviews as $review)
                        @if($review->is_approved)
                            <div class="border-bottom pb-3 mb-3">
                                <strong>{{ $review->reviewer }}</strong>

                                <div class="text-warning mb-1">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fa fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                                    @endfor
                                </div>

                                <p class="mb-1 text-muted">{{ $review->description }}</p>
                                <small class="text-secondary">{{ $review->created_at->diffForHumans() }}</small>
                            </div>
                        @endif
                    @empty
                        <p class="text-muted">Belum ada review.</p>
                    @endforelse
                </div>

                <!-- FORM -->
                <div class="bg-white p-4 rounded-4 shadow-sm mt-4">
                    <h4 class="mb-3">✍️ Leave a Review</h4>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('landing.attraction.review.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name='reviewable_id' value="{{ $attraction->id }}">
                        <input type="hidden" name='reviewable_type' value="{{ get_class($attraction) }}">

                        <div class="mb-3">
                            <input type="text" name="reviewer" class="form-control" placeholder="Your Name" required>
                        </div>

                        <div class="mb-3">
                            <select name="rating" class="form-control">
                                <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
                                <option value="4">⭐⭐⭐⭐ Very Good</option>
                                <option value="3">⭐⭐⭐ Good</option>
                                <option value="2">⭐⭐ Fair</option>
                                <option value="1">⭐ Poor</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <textarea name="description" class="form-control" rows="4" placeholder="Your experience..." required></textarea>
                        </div>

                        <button class="btn btn-success w-100">Submit Review</button>
                    </form>
                </div>

            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4">

                <div class="bg-white p-4 rounded-4 shadow-sm sticky-top" style="top: 20px;">
                    <h5 class="fw-bold mb-3">📍 Info</h5>

                    <ul class="list-unstyled">
                        <li><strong>Name:</strong> {{ $attraction->name }}</li>
                        <li><strong>Zone:</strong> {{ $attraction->zone->name ?? '-' }}</li>
                        <li><strong>Hours:</strong> {{ $attraction->opening_hours }}</li>
                        <li><strong>Price:</strong> {{ $attraction->price ?: 'Free' }}</li>
                    </ul>

                    <a href="{{ url('/#featured') }}" class="btn btn-primary w-100 mt-3">
                        ← Back
                    </a>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection