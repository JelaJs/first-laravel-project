@extends('layout')

@section('content')

    <ul>
        @foreach ($cart as $product => $amount)
            <li><p>Id: {{$product}} - Amount:{{$amount}}</p></li>
        @endforeach
    </ul>

@endsection