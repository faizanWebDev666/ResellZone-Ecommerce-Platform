@extends('frontend.layouts.main')

@section('main-container')


    <div class="container">
        <h1>{{ $sofaChair->title }}</h1>
        <p>{{ $sofaChair->description }}</p>
        <p><strong>Price:</strong> ${{ $sofaChair->price }}</p>
        <p><strong>Condition:</strong> {{ $sofaChair->condition }}</p>
        <p><strong>Location:</strong> {{ $sofaChair->location }}, {{ $sofaChair->city }}</p>
        <p><strong>Contact:</strong> {{ $sofaChair->name }} ({{ $sofaChair->phone }})</p>

        @php
            $decodedPictures = json_decode($sofaChair->pictures, true);
        @endphp

        @if (!empty($decodedPictures) && is_array($decodedPictures))
            <div id="carousel-{{ $sofaChair->id }}" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($decodedPictures as $index => $imagePath)
                        @if ($index < 12)
                            <!-- Limit to 12 images -->
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $imagePath) }}" class="d-block w-100"
                                    alt="Image {{ $index + 1 }}">
                            </div>
                        @endif
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carousel-{{ $sofaChair->id }}" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-{{ $sofaChair->id }}" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        @else
            <img src="{{ asset('default-image.jpg') }}" class="card-img-top" alt="No image available">
        @endif
    </div>
    @endsection
