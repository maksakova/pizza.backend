@extends('layouts.app')

@section('content')
    @include('admin.parts.navigation-discounts')
    <div class="container">
        <div class="card">
            @if($discount->exists)
                <form class="js-validation-form" action="{{route('admin.discounts.update', ['discount' => $discount])}}" enctype="multipart/form-data" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h2><a href="{{route('admin.discounts.index')}}"><i class="fas fa-chevron-left"></i> {{$discount->name}}</a></h2>
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
                                    Заголовок
                                    <input type="text" name="name" value="{{$discount->name}}">
                                </label>
                                <label>
                                    Ссылка на акцию
                                    <input type="text" name="slug" value="{{$discount->slug}}">
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="input-file">
                                    <input type="file" name="img">
                                    <span id="file-name">Файл не выбран</span>
                                </label>
                                @if($discount->img)
                                    <a href="{{ $discount->img }}" data-fancybox="image">
                                        <img src="{{ $discount->img }}">
                                    </a>
                                @endif
                            </div>
                        </div>
                        <label>
                            Описание
                            <textarea name="content">{{$discount->content}}</textarea>
                        </label>
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
                            <form method="POST" action="{{ route('admin.discounts.destroy', $discount->id) }}">
                                <div class="modal-body">
                                    @method('DELETE')
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            Вы действительно хотите удалить баннер?
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
                <form method="POST" action="{{ route('admin.discounts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h2><a href="{{route('admin.discounts.index')}}"><i class="fas fa-chevron-left"></i> Новая акция</a></h2>
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
                                    Заголовок
                                    <input type="text" name="name" value="{{$discount->name}}">
                                </label>
                                <label>
                                    Ссылка на акцию
                                    <input type="text" name="slug" value="{{$discount->slug}}">
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
                    <label>
                        Описание
                        <textarea name="content">{{$discount->content}}</textarea>
                    </label>
                </form>
            @endif
        </div>
    </div>
@endsection
