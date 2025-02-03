@extends('layout')

@section('content')

    <ul>
        @foreach ($products as $product)
            <li><p>{{$product['name']}} Amount: {{$product['amount']}} Price: {{$product['price']}} $</p></li>
        @endforeach
    </ul>

@endsection