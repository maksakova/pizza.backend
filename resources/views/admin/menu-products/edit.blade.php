@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @if($menuProduct->exists)
                    <form class="js-validation-form" action="{{route('admin.menu-products.update', ['menu_product' => $menuProduct])}}" enctype="multipart/form-data" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h1><a href="{{route('admin.menu-products.index')}}"><i class="fas fa-chevron-left"></i> {{ $menuProduct->name }}</a></h1>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Удалить</button>
                            </div>
                        </div>
                        <label>
                            <input type="text" name="name" value="{{$menuProduct->name}}">
                        </label>
                        <label>
                            <select name="menu_category_id">
                                @foreach($menuCategories as $menuCategory)
                                    <option value="{{$menuCategory->id}}" @if($menuProduct->menu_category_id === $menuCategory->id) selected @endif>
                                        {{$menuCategory->name}}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                        <label>
                            <select name="menu_filter_id">
                                <option>1</option>
                            </select>
                        </label>
                        <label>
                            <input type="checkbox" name="ingredients" value="{{$menuProduct->ingredients}}" @if($menuProduct->ingredients) checked @endif>
                            Изменение состава
                        </label>
                        <label>
                            <input type="text" name="composition" value="{{$menuProduct->composition}}">
                        </label>
                        <label>
                            <input type="number" name="min_price" value="{{$menuProduct->min_price}}">
                        </label>
                        <label>
                            <input type="checkbox" name="variants_show" value="{{$menuProduct->variants_show}}" @if($menuProduct->variants_show) checked @endif>
                            Показывать варианты
                        </label>
                        <label>
                            <input type="file" name="img">
                            @if($menuProduct->img)
                                <img src="{{ $menuProduct->img }}">
                            @endif
                        </label>
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
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <form method="POST" action="{{ route('admin.menu-products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h1><a href="{{route('admin.menu-products.index')}}"><i class="fas fa-chevron-left"></i> Новая позиция</a></h1>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>
                        <label>
                            <input type="text" name="name">
                        </label>
                        <label>
                            <select name="menu_category_id">
                                @foreach($menuCategories as $menuCategory)
                                    <option value="{{$menuCategory->id}}">
                                        {{$menuCategory->name}}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                        <label>
                            <select name="menu_filter_id">
                                <option>1</option>
                            </select>
                        </label>
                        <label>
                            <input type="checkbox" name="ingredients">
                            Изменение состава
                        </label>
                        <label>
                            <input type="text" name="composition">
                        </label>
                        <label>
                            <input type="number" name="min_price">
                        </label>
                        <label>
                            <input type="checkbox" name="variants_show">
                            Показывать варианты
                        </label>
                        <label>
                            <input type="file" name="img">
                            @if($menuProduct->img)
                                <img src="{{ $menuProduct->img }}">
                            @endif
                        </label>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
