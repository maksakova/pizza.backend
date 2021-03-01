@extends('layouts.app')

@section('content')
    @include('admin.parts.navigation-discounts')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-sm-6">
                        <h2>
                            <a href="{{route('admin')}}"><i class="fas fa-chevron-left"></i> Слайдер</a>
                        </h2>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a class="btn btn-primary add" href="{{ route('admin.main-banners.create') }}">Добавить</a>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Баннер</th>
                        <th>Ссылка</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mainBanners as $key=>$item)
                        <tr>
                            <td>
                                {{ ++$key }}
                            </td>
                            <td>
                                <a href="{{route('admin.main-banners.edit', $item->id)}}">
                                    @if($item->img)
                                        <img src="{{ $item->img }}" class="icon">
                                    @endif
                                </a>
                            </td>
                            <td>
                                {{ $item->link }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
