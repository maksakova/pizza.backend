@extends('layouts.app')

@section('content')
    @include('admin.parts.navigation-menu')
    <div class="container">
        <div class="card">
            @if($menuProduct->exists)
                <form class="js-validation-form" action="{{route('admin.menu-products.update', ['menu_product' => $menuProduct])}}" enctype="multipart/form-data" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h2><a href="{{route('admin.menu-products.index')}}"><i class="fas fa-chevron-left"></i> {{ $menuProduct->name }}</a></h2>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Удалить</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>
                                    Название
                                    <input type="text" name="name" value="{{$menuProduct->name}}">
                                </label>
                                <label>
                                    Категория
                                    <select name="menu_category_id">
                                        @foreach($menuCategories as $menuCategory)
                                            @if($menuProduct->menu_category_id == $menuCategory->id)
                                                <option value="{{$menuCategory->id}}" selected>
                                                    {{$menuCategory->name}}
                                                </option>
                                            @else
                                                <option value="{{$menuCategory->id}}" >
                                                    {{$menuCategory->name}}
                                                    {{$menuProduct->menu_category_id}}
                                                    {{$menuCategory->id}}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </label>
                                <label>
                                    Фильтр
                                    <select name="menu_filter_id">
                                        <option value="">Нет</option>
                                        @foreach($menuFilters as $menuFilter)
                                            @if($menuProduct->menu_filter_id === $menuFilter->id)
                                            <option value="{{$menuFilter->id}}" selected>
                                                {{$menuFilter->name}}
                                            </option>
                                            @else
                                                <option value="{{$menuFilter->id}}">
                                                    {{$menuFilter->name}}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </label>
                                <label>
                                    Минимальная цена
                                    <input type="text" name="min_price" value="{{$menuProduct->min_price}}">
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" name="variants_show" value="1" {{ $menuProduct->variants_show ? 'checked="checked"' : '' }}>
                                    <div class="checkbox__text">Показывать варианты</div>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="input-file">
                                    <input type="file" name="img">
                                    <span id="file-name">Файл не выбран</span>
                                </label>
                                @if($menuProduct->img)
                                    <a href="{{ $menuProduct->img }}" data-fancybox="image"><img src="{{ $menuProduct->img }}"></a>
                                @endif

                                @if($menuProduct->productVariants)
                                    <h2>Варианты (<a href="{{ route('admin.menu-product-variants.create') }}?menu_product_id={{$menuProduct->id}}">добавить</a>)</h2>
                                    <ul>
                                        @foreach($menuProduct->productVariants as $variant)
                                            <li>
                                                {{$variant->menuCategory->name}}:
                                                <a href="{{route('admin.menu-product-variants.edit', $variant->id)}}">
                                                    {{$variant->name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                        @if(!$menuProduct->menuCategory->ingredients)
                            <label>
                                Состав
                                <input type="text" name="composition" value="{{$menuProduct->composition}}">
                            </label>
                        @else
                            <h2>Состав</h2>
                            <div class="composition">
                                @foreach($menuIngredients as $menuIngredient)
                                    <label class="checkbox">
                                        <input
                                            type="checkbox"
                                            name="composition[]" value="{{$menuIngredient->name}}"
                                            @foreach($ingredient_ids as $ingredient_id)
                                            @if($ingredient_id == $menuIngredient->name) checked @endif
                                            @endforeach>
                                        <div class="checkbox__text">{{$menuIngredient->name}}</div>
                                    </label>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </form>
                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Подтверждение</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="{{ route('admin.menu-products.destroy', $menuProduct->id) }}">
                                <div class="modal-body">
                                    @method('DELETE')
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            Вы действительно хотите удалить "{{ $menuProduct->name }}" ?
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <form method="POST" action="{{ route('admin.menu-products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h2><a href="{{route('admin.menu-products.index')}}"><i class="fas fa-chevron-left"></i> Новая позиция</a></h2>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>
                                    Название
                                    <input type="text" name="name" value="{{$menuProduct->name}}">
                                </label>
                                <label>
                                    Категория
                                    <select name="menu_category_id">
                                        @foreach($menuCategories as $menuCategory)
                                            @if($menuProduct->menu_category_id === $menuCategory->id)
                                                <option value="{{$menuCategory->id}}" selected>
                                                    {{$menuCategory->name}}
                                                </option>

                                            @else
                                                <option value="{{$menuCategory->id}}">
                                                    {{$menuCategory->name}}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </label>
                                <label>
                                    Фильтр
                                    <select name="menu_filter_id">
                                        <option value="">Нет</option>
                                        @foreach($menuFilters as $menuFilter)
                                            @if($menuProduct->menu_filter_id === $menuFilter->id)
                                                <option value="{{$menuFilter->id}}" selected>
                                                    {{$menuFilter->name}}
                                                </option>

                                            @else
                                                <option value="{{$menuFilter->id}}">
                                                    {{$menuFilter->name}}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </label>
                                <label>
                                    Минимальная цена
                                    <input type="text" name="min_price" value="{{$menuProduct->min_price}}">
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" name="variants_show" value="{{$menuProduct->variants_show}}" @if($menuProduct->variants_show) checked @endif>
                                    <div class="checkbox__text">Показывать варианты</div>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="input-file">
                                    <input type="file" name="img">
                                    <span id="file-name">Файл не выбран</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
