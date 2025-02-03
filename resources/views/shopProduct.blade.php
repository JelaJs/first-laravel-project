@extends('layout')

@section('content')

<div class="bg-gray-100 p-6">
    <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-md">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Product Details</h2>
        <p class="text-lg text-gray-700 font-medium">{{$product->name}}</p>
        <p class="text-gray-600">{{$product->description}}</p>
        <p class="text-gray-800 font-semibold">Amount: {{$product->amount}}</p>
        <p class="text-green-600 font-bold text-lg">${{$product->price}}</p>
    </div>

    <form class="bg-white shadow-md rounded-lg p-6 space-y-6 max-w-lg my-3" method="POST" action="{{route('cart.add')}}">
        @if ($errors->any())
            <p>Error: {{ $errors->first() }}</p>
        @endif
        
        @csrf

        <div>
            <input 
                type="hidden" 
                name="id"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3"
                value="{{$product->id}}"
                required>
        </div>
        <div>
            <label class="block text-gray-700 font-medium mb-2">Amount</label>
            <input 
                type="number" 
                name="amount"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3"
                placeholder="30" 
                required>
        </div>
        <div>
            <button 
                type="submit" 
                class="w-full bg-blue-500 text-white font-semibold rounded-lg p-3 hover:bg-blue-600 transition duration-300">
                Add to cart
            </button>
        </div>
    </form>
</div>


@endsection