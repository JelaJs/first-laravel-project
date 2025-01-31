@extends("layout")

@section("content")
<div class="container mx-auto px-4 py-8">
    <form class="bg-white shadow-md rounded-lg p-6 space-y-6 max-w-lg mx-auto" method="POST" action="{{ route("contacts.edit") }}">
        @if ($errors->any())
            <p>Error: {{ $errors->first() }}</p>
        @endif
        
        @csrf

        <div>
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <input 
                type="email" 
                id="email" 
                name="email"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3"
                placeholder="Enter your email" 
                value="{{ $singleContact->email }}"
                required>
        </div>
        <div>
            <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
            <input 
                type="text" 
                id="subject" 
                name="subject"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3"
                placeholder="Enter the subject" 
                value="{{ $singleContact->subject }}"
                required>
        </div>
        <div>
            <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
            <textarea 
                id="message" 
                name="message"
                rows="4" 
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3"
                placeholder="Write your message" 
                required>{{ $singleContact->message }}</textarea>
        </div>
        <div>
            <input type="hidden" name="id" value="{{ $singleContact->id }}">
        </div>
        <div>
            <button 
                type="submit" 
                class="w-full bg-blue-500 text-white font-semibold rounded-lg p-3 hover:bg-blue-600 transition duration-300">
                Edit
            </button>
        </div>
    </form>
</div>
@endsection