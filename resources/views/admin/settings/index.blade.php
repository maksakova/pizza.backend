@extends('layouts.app')

@section('content')
    @include('admin.parts.navigation-settings')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-sm-6">
                        <h2>
                            <a href="{{route('admin')}}"><i class="fas fa-chevron-left"></i> Контакты</a>
                        </h2>
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
                    @foreach($settings as $key=>$item)
                        <tr>
                            <td>
                                {{ ++$key }}
                            </td>
                            <td>
                                <a href="{{route('admin.settings.edit', $item->id)}}">
                                    {{ $item->name }}
                                </a>
                            </td>
                            <td>
                                {{$item->value}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
