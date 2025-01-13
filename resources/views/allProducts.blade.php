@extends('layout')

@section('content')
<div class="w-full mx-auto">
    <h1 class="text-2xl font-bold mb-4 text-center">Products</h1>
    <div class="overflow-x-auto">
      <table class="w-full mx-auto border-collapse border border-gray-200 bg-white shadow-md">
        <thead class="bg-gray-200">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Name</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Amount</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Price</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Image</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Description</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
            <tr class="border-b border-gray-200">
                <td class="px-6 py-4 text-sm text-gray-700">{{ $product->name }}</td>
                <td class="px-6 py-4 text-sm text-gray-700">{{ $product->amount }}</td>
                <td class="px-6 py-4 text-sm text-gray-700">{{ $product->price }} $</td>
                <td class="px-6 py-4 text-sm">
                <img src="https://via.placeholder.com/50" alt="Product 1 Image" class="w-12 h-12 object-cover rounded-md">
                </td>
                <td class="px-6 py-4 text-sm text-gray-700">{{ $product->description }}</td>
                <td><a href="/admin/delete-product/{{$product->id}}">Delete</a></td>
                <td><a href="">Update</a></td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
@endsection