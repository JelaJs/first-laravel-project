@extends('layout')

@section('content')
        <div class="w-full mx-auto">
            <h1 class="text-2xl font-bold mb-4 text-center">Contacts</h1>
            <div class="overflow-x-auto">
              <table class="w-full mx-auto border-collapse border border-gray-200 bg-white shadow-md">
                <thead class="bg-gray-200">
                  <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Subject</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Message</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($allContacts as $contact)
                    <tr class="border-b border-gray-200">
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $contact->email }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $contact->subject }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $contact->message }}</td>
                        <td class="px-6 py-4 text-sm">
                        <td><a href="/admin/delete-contact/{{$contact->id}}">Delete</a></td>
                        <td><a href="">Update</a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
@endsection