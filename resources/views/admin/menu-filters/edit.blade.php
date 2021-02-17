@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @if($menuFilter->exists)
                    <form class="js-validation-form" action="{{route('admin.menu-filters.update', ['menu_filter' => $menuFilter])}}" enctype="multipart/form-data" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h1><a href="{{route('admin.menu-filters.index')}}"><i class="fas fa-chevron-left"></i> {{ $menuFilter->name }}</a></h1>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>
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
                                <label>
                                    <input type="file" name="img">
                                </label>
                                @if($menuFilter->img)
                                    <img src="{{ $menuFilter->img }}">
                                @endif
                            </div>
                        </div>
                    </form>
                @else
                    <form method="POST" action="{{ route('admin.menu-filters.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h1><a href="{{route('admin.menu-filters.index')}}"><i class="fas fa-chevron-left"></i> Новый фильтр</a></h1>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>
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
