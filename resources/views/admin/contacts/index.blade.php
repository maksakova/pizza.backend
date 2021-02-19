@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-sm-6">
                        <h1>
                            <a href="{{route('admin')}}"><i class="fas fa-chevron-left"></i> Фильтры</a>
                        </h1>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Название</th>
                        <th>Значение</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $key=>$item)
                        <tr>
                            <td>
                                {{ ++$key }}
                            </td>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td>
                                <a href="{{route('admin.contacts.edit', $item->id)}}">
                                    @if($item->img)
                                        <img src="{{ $item->img }}"">
                                    @else
                                        {{$item->value}}
                                    @endif
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
