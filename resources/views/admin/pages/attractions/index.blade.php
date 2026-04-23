@extends('admin.master')

@section('content')
    
<h1>Attractions</h1>

<a href="{{ route('admin.attractions.create') }}" class="btn btn-primary">Create Attraction</a>
<hr>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Ticket Price</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($attractions as $attraction)
        <tr>
            <td>{{ $attraction->id }}</td>
            <td>{{ $attraction->name }}</td>
            <td>{{ $attraction->price_range }}</td>
            <td><img src="{{ asset('storage/images/' . $attraction->image) }}" alt="{{ $attraction->name }}" width="100"></td>
            <td>
                <a href="{{ route('admin.attractions.show', $attraction) }}" class="btn btn-info">View</a>
                <a href="{{ route('admin.attractions.edit', $attraction) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('admin.attractions.destroy', $attraction->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">No Attraction found.</td>
        </tr>
        @endforelse
    </tbody>
</table>


@endsection