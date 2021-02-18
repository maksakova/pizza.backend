@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-sm-6">
                        <h1>
                            <a href="{{route('admin')}}"><i class="fas fa-chevron-left"></i> Слайдер</a>
                        </h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a class="btn btn-primary add" href="{{ route('admin.discounts.create') }}">Добавить</a>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Изображение</th>
                        <th>Название</th>
                        <th>Срок действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($discounts as $key=>$item)
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
                                <a href="{{route('admin.discounts.edit', $item->id)}}">
                                    {{ $item->name }}
                                </a>
                            </td>
                            <td>
                                {{ $item->time }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
