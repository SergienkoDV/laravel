@extends('base')
@section('content')
<div class="row">
    <div class="col-md-2">
        <img class="card-img-top" src="{{ $product->img }}">
    </div>
    <div class="col-md-10">
{{ $product->title }} <br>
       цена: {{ $product->price }} рублей
{{ $product->description }} <br>

@endsection