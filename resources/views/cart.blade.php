@extends('layout')

@section('content')

    <ul>
        @foreach ($cart as $product)
            <li><p>Id: {{$product['product_id']}} Amount {{$product['amount']}}</p></li>
        @endforeach
    </ul>

@endsection