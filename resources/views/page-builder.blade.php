@extends('lardmin::layout')
@section('content')
    @foreach($elements as $element)
        {{ $element->getElement() }}
    @endforeach
@endsection
