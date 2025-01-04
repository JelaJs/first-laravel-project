@extends('layout')

@section("content")
    <ul>
        @foreach ($products as $product)
            @if ($product === "iPhone 14" || $product === "iPhone 13 pro")
                <li>{{ $product }} - Snizenje</li>
            @else
                <li>{{ $product }}</li>
            @endif
        @endforeach
    </ul>
@endsection