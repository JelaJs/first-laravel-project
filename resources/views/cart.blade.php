@extends('layout')

@section('content')

    @if($combined)
        <ul>
            @foreach ($combined as $product)
                <li><p>{{$product['name']}} - Amount: {{$product['amount']}} - Price: {{$product['price']}} - Total Price: {{$product['totalPrice']}}</p></li>
            @endforeach
        </ul>
    @else
        <p>Cart is empty</p>
    @endif

    <a class=" bg-blue-500 text-white font-semibold rounded-lg p-1 hover:bg-blue-600 transition duration-300" href="{{route('cart.order')}}">Finish Order</a>

    @if($errors->any())
        <p>{{$errors->first()}}</p>
    @endif
@endsection