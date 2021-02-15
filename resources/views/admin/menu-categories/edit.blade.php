@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @if($menuCategory->exists)
                    <form class="js-validation-form" action="{{route('admin.menu-categories.update', ['menuCategory' => $menuCategory->id])}}" enctype="multipart/form-data" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h1>{{ $menuCategory->name }}</h1>
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
                @else
                    <form method="POST" action="{{ route('admin.menu-categories.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h1>Новая категория</h1>
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
