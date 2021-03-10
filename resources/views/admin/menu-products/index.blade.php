@extends('layouts.app')

@section('content')
    @include('admin.parts.navigation-menu')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6 text-right">
                        <a class="btn btn-primary add" href="{{ route('admin.menu-products.create') }}">Добавить</a>
                    </div>
                </div>
                <div class="table-outer">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Изображение</th>
                        <th>Название</th>
                        <th>Категория</th>
                        <th>Цена</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menuProducts as $key=>$item)
                        <tr>
                            <td>
                                {{ ++$key }}
                            </td>
                            <td>
                                @if($item->img)
                                    <img src="{{ $item->img }}">
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.menu-products.edit', $item->id)}}">{{ $item->name }}</a>
                            </td>
                            <td>
                                <a href="{{route('admin.menu-categories.show', $item->menuCategory->id)}}">{{ $item->menuCategory->name }}</a>
                            </td>
                            <td>
                                {{ $item->min_price }} BYN
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection
