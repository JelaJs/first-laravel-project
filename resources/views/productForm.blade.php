@extends('layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <form class="bg-white shadow-md rounded-lg p-6 space-y-6 max-w-lg mx-auto" method="POST" action="/add-product">
        @if ($errors->any())
            <p>Error: {{ $errors->first() }}</p>
        @endif
        
        @csrf

        <div>
            <label class="block text-gray-700 font-medium mb-2">Name</label>
            <input 
                type="text" 
                name="name"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3"
                placeholder="Enter product name" 
                required>
        </div>
        <div>
            <label class="block text-gray-700 font-medium mb-2">Amount</label>
            <input 
                type="number" 
                name="amount"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3"
                placeholder="Add Amount" 
                required>
        </div>
        <div>
            <label class="block text-gray-700 font-medium mb-2">Price</label>
            <input 
                type="number" 
                name="price"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3"
                placeholder="Add price" 
                required>
        </div>
        <div>
            <label class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea 
                name="description"
                rows="4" 
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3"
                placeholder="Write your message" 
                required></textarea>
        </div>
        <div>
            <button 
                type="submit" 
                class="w-full bg-blue-500 text-white font-semibold rounded-lg p-3 hover:bg-blue-600 transition duration-300">
                Add Product
            </button>
        </div>
    </form>
</div>
@endsection