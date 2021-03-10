@extends('layouts.app')

@section('content')
    @include('admin.parts.navigation-pages')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-sm-6">
                        <h2>
                            <a href="{{route('admin')}}"><i class="fas fa-chevron-left"></i> Страницы</a>
                        </h2>
                    </div>
                </div>
                <div class="table-outer">
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
    </div>
@endsection
