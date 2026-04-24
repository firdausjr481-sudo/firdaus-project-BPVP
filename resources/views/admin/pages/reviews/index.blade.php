@extends('admin.master')

@section('content')

<div class="mb-5">
    <h1>Reviews</h1>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Reviewer</th>
                <th>Description</th>
                <th>Rating</th>
                <th>Approved</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->reviewer }}</td>
                <td>{{ $review->description }}</td>
                <td>{{ $review->rating }}</td>
                <td>{{ $review->is_approved ? 'Yes' : 'No' }}</td>
                <td>
                    <form action="{{ route('admin.reviews.toggleApproval', $review) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm {{ $review->is_approved ? 'btn-warning' : 'btn-success' }}">
                            {{ $review->is_approved ? 'Unapprove' : 'Approve' }}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection