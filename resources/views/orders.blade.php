@extends('base')
@section('content')

    <div class="container">
        <h4>Управление заказами</h4>
        <a class="btn btn-success" href="#"> Создать</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Адресс</th>
            <th scope="col">Дата</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
        <tr>
            <th scope="row">{{$order->id}}</th>
            <td>{{$order->address}}</td>
            <td>{{$order->date}}</td>
            <td><a href="#смотреть">&#9776;</a>
                <a href="#редактировать">&#10000;</a>
                <a href="#удалить">&#10006;</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection