@extends('layouts.app')

@section('content')
    @include('admin.parts.navigation-menu')
    <div class="container">
        <div class="card">
            @if($menuCategory->exists)
                <form class="js-validation-form" action="{{route('admin.menu-categories.update', ['menu_category' => $menuCategory])}}" enctype="multipart/form-data" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h2><a href="{{route('admin.menu-categories.index')}}"><i class="fas fa-chevron-left"></i> {{ $menuCategory->name }}</a></h2>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Удалить</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                    Название
                                    <input type="text" name="name" value="{{$menuCategory->name}}">
                                </label>
                                <label>
                                    Слаг
                                    <input type="text" name="slug" value="{{$menuCategory->slug}}">
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="input-file">
                                    <input type="file" name="img">
                                    <span id="file-name">Файл не выбран</span>
                                </label>
                                @if($menuCategory->img)
                                    <a href="{{ $menuCategory->img }}" data-fancybox="image">
                                        <img src="{{ $menuCategory->img }}">
                                    </a>
                                @endif
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
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="{{ route('admin.menu-categories.destroy', $menuCategory->id) }}">
                                <div class="modal-body">
                                    @method('DELETE')
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            Вы действительно хотите удалить "{{ $menuCategory->name }}" ?
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
                <form method="POST" action="{{ route('admin.menu-categories.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h2><a href="{{route('admin.menu-categories.index')}}"><i class="fas fa-chevron-left"></i> Новая категория</a></h2>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                    Название
                                    <input type="text" name="name" value="{{$menuCategory->name}}">
                                </label>
                                <label>
                                    Слаг
                                    <input type="text" name="slug" value="{{$menuCategory->slug}}">
                                </label>
                            </div>
                            <div class="col-md-6">
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
