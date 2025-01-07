@extends('layout')

@section('content')
   
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Features</h2>
        <ul class="space-y-3">
            @foreach ($allContacts as $contact)

            <li class="flex items-center gap-3 bg-gray-50 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <p class="text-gray-700 font-medium">{{ $contact['email'] }}</p>
            </li>

            <li class="flex items-center gap-3 bg-gray-50 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <p class="text-gray-700 font-medium">{{ $contact['subject'] }}</p>
            </li>

            <li class="flex items-center gap-3 bg-gray-50 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <p class="text-gray-700 font-medium">{{ $contact['message'] }}</p>
            </li>
                
            @endforeach
        </ul>
 
@endsection