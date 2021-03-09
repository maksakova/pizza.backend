@extends('layouts.app')

@section('content')
    @include('admin.parts.navigation-orders')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-sm-6">
                        <h2>
                            <a href="{{route('admin')}}"><i class="fas fa-chevron-left"></i> Заказы</a>
                        </h2>
                    </div>
                    {{--<div class="col-sm-6 text-right">
                        <a class="btn btn-primary add" href="{{ route('admin.orders.create') }}">Добавить</a>
                    </div>--}}
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Статус</th>
                        <th>Дата</th>
                        <th>Адрес</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $key=>$item)
                        <tr>
                            <td>
                                {{ ++$key }}
                            <td>
                                {{ $item->status->name }}
                            </td>
                            <td>
                                <a href="{{route('admin.orders.edit', $item->id)}}">{{ $item->created_at }}</a>
                            </td>
                            <td>
                                {{ $item->street }} {{ $item->building }} {{ $item->flat }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
