@extends('base')
@section('content')
        <div class="row">
            @foreach($products as $product)
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col col-xs-6 mastercart display-flex">
                <div class="card" style="">
                    <img class="card-img-top" src="{{ $product->img }}">
                    <div class="card-body">
                        <h5 class="card-title normal">{{ $product->title }}</h5>
                        <h5 class="card-title italic">{{ $product->description }}</h5>
                        <p class="card-text"></p>
                        <a href="product/{{ $product->id }}" class="btn-profile">Подробнее</a>
                    </div>
                </div>
             </div>
@endforeach
        </div>
    <style>
        .row{
            padding: 10px;
        }
    </style>
  @endsection


