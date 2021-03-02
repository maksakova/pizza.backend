@extends('layouts.app')

@section('content')
    @include('admin.parts.navigation-contacts')
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
                    @foreach($contacts as $key=>$item)
                        <tr>
                            <td>
                                {{ ++$key }}
                            </td>
                            <td>
                                <a href="{{route('admin.contacts.edit', $item->id)}}">
                                    {{ $item->name }}
                                </a>
                                <a href="{{route('admin.contacts.edit', $item->id)}}">
                                    {{ $item->name }}
                                </a>
                            </td>
                            <td>
                                @if($item->img)
                                    <img src="{{ $item->img }}">
                                @else
                                    {{$item->value}}
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
