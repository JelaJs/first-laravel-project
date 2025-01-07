@extends('layout')

@section("content")
    <ul>
        @foreach ($last6products as $product)
            <li class="flex items-center gap-3 bg-gray-50 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <p class="text-gray-700 font-medium">Product - {{ $product['name'] }}</p>
                <p class="text-gray-700 font-medium">Description - {{ $product['description'] }}</p>
                <p class="text-gray-700 font-medium">Amount - {{ $product['amount'] }}</p>
                <p class="text-gray-700 font-medium">Price - {{ $product['price'] }}</p>
            </li>
        @endforeach
    </ul>
@endsection