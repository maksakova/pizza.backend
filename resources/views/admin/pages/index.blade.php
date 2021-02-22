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
                        <th>Слаг</th>
                        <th>Название</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $key=>$item)
                        <tr>
                            <td>
                                {{ ++$key }}
                            </td>
                            <td>
                                {{ $item->slug }}
                            </td>
                            <td>
                                <a href="{{route('admin.pages.edit', $item->id)}}">
                                    {{$item->name}}
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
