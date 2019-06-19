@extends('CRUD')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
        .btn{
            margin-bottom: 5px;
        }
        .link{
            width: 50px;
        }
        img{
            margin-right: 10px;
        }
        .total{
            padding: 5px;
            margin: 3px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <h4>Список позиций товара на адресс: {{$orders->address}}</h4>
            <a href="{{ route('positioncreate', $orders->id)}}" class="btn btn-success">добавить товар</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Товар</th>
                <th scope="col">Количество</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($orders->positions as $position)
                <tr>
                    <td><img  style="width: 8rem;" src="{{$position->products->img}}"><strong>{{$position->products->title}}</strong></td>
                    <td class="form-inline">
                        @if (($position->total) > 1)
                            <form action="{{ route('totalminus', $position->id)}}" method="get">
                                @csrf
                                <button class="btn btn-danger total" type="submit">-</button>
                            </form>
                        @else
                        @endif
                        {{$position->total}}
                        <form action="{{ route('totalplus', $position->id)}}" method="get">
                            @csrf
                            <button class="btn btn-success total" type="submit">+</button>
                        </form>
                    </td>
                    <td class="link">

                    </td>
                    <td class="link"><a href="http://localhost/laravel/public/product/{{$position->products->id}}" class="btn btn-success">&#9776;</a></td>
                    <td class="link"><a href="{{ route('positions.edit',$position->id)}}" class="btn btn-primary">&#10000;</a></td>
                    <td class="link">
                        <form action="{{ route('positions.destroy', $position->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">&#10006;</button>
                        </form>
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