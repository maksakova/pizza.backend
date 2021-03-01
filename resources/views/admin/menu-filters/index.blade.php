@extends('layouts.app')

@section('content')
    @include('admin.parts.navigation-menu')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-sm-6">
                        <h2>
                            <a href="{{route('admin')}}"><i class="fas fa-chevron-left"></i> Фильтры</a>
                        </h2>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a class="btn btn-primary add" href="{{ route('admin.menu-filters.create') }}">Добавить</a>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Иконка</th>
                        <th>Название</th>
                        <th>Слаг</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menuFilters as $key=>$item)
                        <tr>
                            <td>
                                {{ ++$key }}
                            </td>
                            <td>
                                @if($item->img)
                                    <img src="{{ $item->img }}" class="icon">
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.menu-filters.edit', $item->id)}}">{{ $item->name }}</a>
                            </td>
                            <td>
                                {{ $item->slug }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
