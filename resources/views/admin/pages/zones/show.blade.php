@extends('admin.master')

@section('content')
<div class="container">
    <h1>{{ $zone->name }}</h1>
    <p>{{ $zone->description }}</p>
    <p><strong>Price Range:</strong> {{ $zone->price_range }}</p>
    <img src="{{ asset('storage/images/' . $zone->image) }}" alt="{{ $zone->name }}" width="300">

</div>


@endsection