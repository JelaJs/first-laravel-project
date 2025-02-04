@extends('layout')

@section('content')

    <ul>
        @foreach ($combined as $product)
            <li><p>{{$product['name']}} - Amount: {{$product['amount']}} - Price: {{$product['price']}} - Total Price: {{$product['totalPrice']}}</p></li>
        @endforeach
    </ul>

@endsection