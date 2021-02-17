@extends('layouts.app')

@section('content')
    @if($menuIngredientGroup->exists)
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form class="js-validation-form" action="{{route('admin.menu-ingredient-groups.update', ['menu_ingredient_group' => $menuIngredientGroup])}}" enctype="multipart/form-data" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h1><a href="{{route('admin.menu-ingredient-groups.index')}}"><i class="fas fa-chevron-left"></i> {{ $menuIngredientGroup->name }}</a></h1>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>
                        <div  class="row">
                            <div class="col-lg-6">
                                <label>
                                    Название
                                    <input type="text" name="name" value="{{$menuIngredientGroup->name}}">
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Цена на 25 см
                                    <input type="text" name="min_price" value="{{$menuIngredientGroup->min_price}}">
                                </label>
                                <label>
                                    Цена на 30 см
                                    <input type="text" name="mid_price" value="{{$menuIngredientGroup->mid_price}}">
                                </label>
                                <label>
                                    Цена на 35 см
                                    <input type="text" name="max_price" value="{{$menuIngredientGroup->max_price}}">
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-sm-6">
                            <h2>Ингредиенты: {{ $menuIngredientGroup->name }}</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a class="btn btn-primary add" href="{{ route('admin.menu-ingredients.create') }}?menu_ingredient_group_id={{ $menuIngredientGroup->id }}">Добавить</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Изображение</th>
                            <th>Название</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($menuIngredients as $key=>$item)
                            @php /** @var \App\Models\ViewSetting */ @endphp
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
                                    <a href="{{route('admin.menu-ingredients.edit', $item->id)}}">{{ $item->name }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
@endsection
