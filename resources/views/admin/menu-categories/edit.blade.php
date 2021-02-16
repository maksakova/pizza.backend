@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @if($menuCategory->exists)
                    <form class="js-validation-form" action="{{route('admin.menu-categories.update', ['menu_category' => $menuCategory])}}" enctype="multipart/form-data" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h1><a href="{{route('admin.menu-categories.index')}}"><i class="fas fa-chevron-left"></i> {{ $menuCategory->name }}</a></h1>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Удалить</button>
                            </div>
                        </div>
                        <label>
                            <input type="text" name="name" value="{{$menuCategory->name}}">
                        </label>
                        <label>
                            <input type="text" name="slug" value="{{$menuCategory->slug}}">
                        </label>
                        <label>
                            <input type="file" name="img">
                            @if($menuCategory->img)
                                <img src="{{ $menuCategory->img }}">
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
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h1><a href="{{route('admin.menu-categories.index')}}"><i class="fas fa-chevron-left"></i> Новая категория</a></h1>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>
                        <label>
                            <input type="text" name="name" placeholder="Название">
                        </label>
                        <label>
                            <input type="text" name="slug" placeholder="Слаг">
                        </label>
                        <label>
                            <input type="file" name="img">
                            @if($menuCategory->img)
                                <img src="{{ $menuCategory->img }}">
                            @endif
                        </label>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
