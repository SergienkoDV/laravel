@extends('base')
@section('content')
    <h4>Товар</h4>
    <div class="row">
        <div class="col-md-2">
            <img class="card-img-top" src="{{ $product->img }}">
        </div>
        <div class="col-md-10">
            {{ $product->title }} <br>
            {{ $product->description }} <br>
            цена: {{ $product->price }} рублей

        </div>
    </div>
    <style>
        h4{
            text-align: center;
        }
        .row{
            margin: 10px;
            border: 1px solid grey;
        }
    </style>
@endsection