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
        <h4>Список позиций товара</h4>

            <a href="{{'orders/create }}" class="btn btn-success">Создать</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Товар</th>
                <th scope="col">Количество</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img  style="width: 8rem;" src="{{$position->products->img}}">{{$position->products->title}}</td>
                    <td>{{$position->total}}</td>
                    </td>
                </tr>
            @empty
                <p>пусто</p>
            @endforelse
            </tbody>
        </table>
        <div>
        </div>
    </div>
@endsection