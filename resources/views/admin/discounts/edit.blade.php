@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @if($discount->exists)
                    <form class="js-validation-form" action="{{route('admin.discounts.update', ['discount' => $discount])}}" enctype="multipart/form-data" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h1><a href="{{route('admin.discounts.index')}}"><i class="fas fa-chevron-left"></i> {{$discount->name}}</a></h1>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Удалить</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>
                                    Заголовок
                                    <input type="text" name="name" value="{{$discount->name}}">
                                </label>
                                <label>
                                    Описание
                                    <textarea name="content">{{$discount->content}}</textarea>
                                </label>
                                <label>
                                    Ссылка на акцию
                                    <input type="text" name="slug" value="{{$discount->slug}}">
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    <input type="file" name="img">
                                </label>
                                @if($discount->img)
                                    <a href="{{ $discount->img }}" data-fancybox="image">
                                        <img src="{{ $discount->img }}">
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
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h1><a href="{{route('admin.discounts.index')}}"><i class="fas fa-chevron-left"></i> Новая акция</a></h1>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>
                                    Заголовок
                                    <input type="text" name="name" value="{{$discount->name}}">
                                </label>
                                <label>
                                    Описание
                                    <textarea name="content">{{$discount->content}}</textarea>
                                </label>
                                <label>
                                    Ссылка на акцию
                                    <input type="text" name="slug" value="{{$discount->slug}}">
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
