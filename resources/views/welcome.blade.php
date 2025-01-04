@extends('layout')

@section("content")

    @if($hour >= 0 && $hour <= 12) 
        <p>Dobro jutro</p>
    @else
        <p>Dobar dan</p>
    @endif

    <p>Current date is: {{ $curDate }}</p>
@endsection