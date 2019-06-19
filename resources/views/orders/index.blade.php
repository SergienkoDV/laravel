@extends('CRUD')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
        .btn{
            margin-bottom: 5px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <h4>Управление заявками</h4>
            <a class="btn btn-success" href="{{'orders/create'}}"> Создать заявку</a>
        <table class="table table-striped">
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
                    <td><a href="{{ route('orders.show',$order->id)}}" class="btn btn-success">&#9776;</a></td>
                    <td><a href="{{ route('orders.edit',$order->id)}}" class="btn btn-primary">&#10000;</a></td>
                    <td>
                        <form action="{{ route('orders.destroy', $order->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">&#10006;</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
        </div>
    </div>
@endsection