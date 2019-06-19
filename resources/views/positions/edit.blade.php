@extends('CRUD')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Редактирование
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
                <form method="post" action="{{ route('positions.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Выберите товар</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="products_id">
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->title}}</option>
                            @endforeach
                        </select>
                        <label for="name">Кол-во:</label>
                        <input type="text" class="form-control" name="total"/>
                        <input type="hidden" name="orders_id" value="{{$positions->orders_id}}">
                        @csrf
                    </div>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </form>

        </div>
    </div>
@endsection