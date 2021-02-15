@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-sm-6">
                        <h1>Категории меню</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a class="btn btn-primary add" href="{{ route('admin.menu-categories.create') }}">Добавить</a>
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
                    @foreach($menuCategories as $key=>$item)
                        @php /** @var \App\Models\ViewSetting */ @endphp
                        <tr>
                            <td>
                                {{ ++$key }}
                            </td>
                            <td>
                                {{ $item->img }}
                            </td>
                            <td>
                                <a href="{{route('admin.menu-categories.edit', $item->id)}}">{{ $item->name }}</a>
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
