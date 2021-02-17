@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @if($menuIngredient->exists)
                    <form class="js-validation-form" action="{{route('admin.menu-ingredients.update', ['menu_ingredient' => $menuIngredient])}}" enctype="multipart/form-data" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h1><a href="{{route('admin.menu-ingredient-groups.edit', $menuIngredient->menu_ingredient_group_id)}}"><i class="fas fa-chevron-left"></i> {{ $menuIngredient->name }}</a></h1>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Удалить</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>
                                    Название
                                    <input type="text" name="name" value="{{$menuIngredient->name}}">
                                </label>
                                <label>
                                    Группа
                                    <select name="menu_ingredient_group_id">
                                        @foreach($menuIngredientGroups as $menuIngredientGroup)
                                            <option value="{{$menuIngredientGroup->id}}" @if($menuIngredient->menu_ingredient_group_id === $menuIngredientGroup->id) selected @endif>
                                                {{$menuIngredientGroup->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>

                                @foreach($menuCategories as $menuCategory)
                                    <label class="checkbox">
                                        <input
                                            type="checkbox"
                                            name="menu_category_id[]" value="{{$menuCategory->id}}"
                                            @foreach($menu_category_ids as $menu_category_id)
                                            @if($menu_category_id == $menuCategory->id) checked @endif
                                            @endforeach>
                                        <div class="checkbox__text">{{$menuCategory->name}}</div>
                                    </label>
                                @endforeach
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    <input type="file" name="img">
                                </label>
                                @if($menuIngredient->img)
                                    <a href="{{ $menuIngredient->img }}" data-fancybox="image">
                                        <img src="{{ $menuIngredient->img }}">
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Подтверждение</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{ route('admin.menu-ingredients.destroy', $menuIngredient->id) }}">
                                    <div class="modal-body">
                                        @method('DELETE')
                                        @csrf
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                Вы действительно хотите удалить "{{ $menuIngredient->name }}" ?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Удалить</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <form method="POST" action="{{ route('admin.menu-ingredients.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h1><a href="{{route('admin.menu-ingredients.index')}}"><i class="fas fa-chevron-left"></i> Новая позиция</a></h1>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>
                                    Название
                                    <input type="text" name="name">
                                </label>
                                <label>
                                    Группа
                                    <select name="menu_ingredient_group_id">
                                        @foreach($menuIngredientGroups as $menuIngredientGroup)
                                            <option value="{{$menuIngredientGroup->id}}" @if(app('request')->input('menu_ingredient_group_id') == $menuIngredientGroup->id) selected @endif>
                                                {{$menuIngredientGroup->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    <input type="file" name="img">
                                </label>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
