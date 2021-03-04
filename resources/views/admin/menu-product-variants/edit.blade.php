@extends('layouts.app')

@section('content')
    @include('admin.parts.navigation-menu')
    <div class="container">
        <div class="card">
            @if($menuProductVariant->exists)
                <form class="js-validation-form" action="{{route('admin.menu-product-variants.update', ['menu_product_variant' => $menuProductVariant])}}" enctype="multipart/form-data" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h2><a href="{{route('admin.menu-products.edit', $menuProductVariant->menu_product_id)}}"><i class="fas fa-chevron-left"></i> {{ $menuProductVariant->name }}</a></h2>
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
                                    <input type="text" name="name" value="{{$menuProductVariant->name}}">
                                </label>
                                <label>
                                    Цена
                                    <input type="text" name="price" value="{{$menuProductVariant->price}}">
                                </label>
                            </div>
                            <div class="col-lg-6">
                            </div>
                        </div>
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
                            <form method="POST" action="{{ route('admin.menu-product-variants.destroy', $menuProductVariant->id) }}">
                                <div class="modal-body">
                                    @method('DELETE')
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            Вы действительно хотите удалить "{{ $menuProductVariant->name }}" ?
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
                <form method="POST" action="{{ route('admin.menu-product-variants.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h2><a href="{{route('admin.menu-product-variants.index')}}"><i class="fas fa-chevron-left"></i> Новая позиция</a></h2>
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
                                    <input type="text" name="name" value="{{$menuProductVariant->name}}">
                                </label>
                                <label>
                                    Цена
                                    <input type="text" name="price" value="{{$menuProductVariant->price}}">
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
