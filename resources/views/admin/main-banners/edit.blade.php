@extends('layouts.app')

@section('content')
    @include('admin.parts.navigation-discounts')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @if($mainBanner->exists)
                    <form class="js-validation-form" action="{{route('admin.main-banners.update', ['main_banner' => $mainBanner])}}" enctype="multipart/form-data" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h2><a href="{{route('admin.main-banners.index')}}"><i class="fas fa-chevron-left"></i> Редактировать баннер</a></h2>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Удалить</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>
                                    Текст
                                    <input type="text" name="text" value="{{$mainBanner->text}}">
                                </label>
                                <label>
                                    Ссылка на акцию
                                    <input type="text" name="link" value="{{$mainBanner->link}}">
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="input-file">
                                    <input type="file" name="img">
                                    <span id="file-name">Файл не выбран</span>
                                </label>
                                @if($mainBanner->img)
                                    <a href="{{ $mainBanner->img }}" data-fancybox="image">
                                        <img src="{{ $mainBanner->img }}">
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
                                <form method="POST" action="{{ route('admin.main-banners.destroy', $mainBanner->id) }}">
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
                    <form method="POST" action="{{ route('admin.main-banners.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h2><a href="{{route('admin.main-banners.index')}}"><i class="fas fa-chevron-left"></i> Новый баннер</a></h2>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>
                                    Текст
                                    <input type="text" name="text" value="{{$mainBanner->text}}">
                                </label>
                                <label>
                                    Ссылка на акцию
                                    <input type="text" name="link" value="{{$mainBanner->link}}">
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="input-file">
                                    <input type="file" name="img">
                                    <span id="file-name">Файл не выбран</span>
                                </label>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
