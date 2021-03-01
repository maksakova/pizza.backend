@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добро пожаловать!</div>

                <div class="card-body">
                    <p>У вас <a href="{{route('admin.orders.index')}}">
                            @if($ordersCount > 0)
                                <span>{{$ordersCount}}</span> новых заказа
                            @else
                                нет новых заказов
                            @endif
                            </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
