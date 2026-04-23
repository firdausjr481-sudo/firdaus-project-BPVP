@extends('admin.master')

@section('content')

<div class="mb-5">
    <h1 class="mb-3 h2">Reviews</h1>

    @if (@session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Reviewer</th>
                <th>Description</th>
                <th>Rating</th>
                <th>Approved</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->reviewer }}</td>
                    <td>{{ $review->description }}</td>
                    <td>{{ $review->rating }}</td>
                    <td>{{ $review->is_approved ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
</div>

@endsection