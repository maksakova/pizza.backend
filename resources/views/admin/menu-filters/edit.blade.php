@extends('layouts.app')

@section('content')
    @include('admin.parts.navigation-menu')
    <div class="container">
        <div class="card">
            @if($menuFilter->exists)
                <form class="js-validation-form" action="{{route('admin.menu-filters.update', ['menu_filter' => $menuFilter])}}" enctype="multipart/form-data" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h2><a href="{{route('admin.menu-filters.index')}}"><i class="fas fa-chevron-left"></i> {{ $menuFilter->name }}</a></h2>
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
                                    <input type="text" name="name" value="{{$menuFilter->name}}">
                                </label>
                                <label>
                                    Слаг
                                    <input type="text" name="slug" value="{{$menuFilter->slug}}">
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="input-file">
                                    <input type="file" name="img">
                                    <span id="file-name">Файл не выбран</span>
                                </label>
                                @if($menuFilter->img)
                                    <img src="{{ $menuFilter->img }}">
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            @else
                <form method="POST" action="{{ route('admin.menu-filters.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h2><a href="{{route('admin.menu-filters.index')}}"><i class="fas fa-chevron-left"></i> Новый фильтр</a></h2>
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
                                    <input type="text" name="name" value="{{$menuFilter->name}}">
                                </label>
                                <label>
                                    Слаг
                                    <input type="text" name="slug" value="{{$menuFilter->slug}}">
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
