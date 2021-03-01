@extends('layouts.app')

@section('content')
    @include('admin.parts.navigation-pages')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @if($page->exists)
                    <form class="js-validation-form" action="{{route('admin.pages.update', ['page' => $page])}}" enctype="multipart/form-data" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h2><a href="{{route('admin.pages.index')}}"><i class="fas fa-chevron-left"></i> {{ $page->name }}</a></h2>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>
                                    Название
                                    <input type="text" name="value" value="{{$page->name}}">
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Дополнительно
                                    <input type="text" name="value" value="{{$page->add}}">
                                </label>
                            </div>
                        </div>
                        <label>
                            <textarea name="content">{{$page->content}}</textarea>
                        </label>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
