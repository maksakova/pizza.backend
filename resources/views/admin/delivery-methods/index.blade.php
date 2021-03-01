@extends('layouts.app')

@section('content')
    @include('admin.parts.navigation-delivery')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-sm-6">
                        <h2>
                            <a href="{{route('admin')}}"><i class="fas fa-chevron-left"></i> Способы доставки</a>
                        </h2>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a class="btn btn-primary add" href="{{ route('admin.delivery-methods.create') }}">Добавить</a>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Название</th>
                        <th>Доступен</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($deliveryMethods as $key=>$item)
                        <tr>
                            <td>
                                {{ ++$key }}
                            </td>
                            <td>
                                <a href="{{route('admin.delivery-methods.edit', $item->id)}}">
                                    {{ $item->name }}
                                </a>
                            </td>
                            <td>
                                @if($item->active === 1)
                                    Да
                                @else
                                    Нет
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
