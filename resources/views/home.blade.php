@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Админ-панель</div>

                <div class="card-body">
                    <ul>
                        <li>
                            <a href="{{route('admin.menu-products.index')}}">Меню</a>
                        </li>
                        <li>
                            <a href="{{route('admin.menu-categories.index')}}">Категории меню</a>
                        </li>
                        <li>
                            <a href="{{route('admin.menu-filters.index')}}">Фильтры</a>
                        </li>
                        <li>
                            <a href="{{route('admin.menu-ingredient-groups.index')}}">Ингредиенты</a>
                        </li>
                        <li>
                            <a href="{{route('admin.main-banners.index')}}">Баннеры</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
