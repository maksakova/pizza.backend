@extends('layouts.app')

@section('content')
    @include('admin.parts.navigation-contacts')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @if($contact->exists)
                    <form class="js-validation-form" action="{{route('admin.contacts.update', ['contact' => $contact])}}" enctype="multipart/form-data" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h2><a href="{{route('admin.contacts.index')}}"><i class="fas fa-chevron-left"></i> {{ $contact->name }}</a></h2>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                @if(!$contact->img)
                                    <label>
                                        {{$contact->name}}
                                        <input type="text" name="value" value="{{$contact->value}}">
                                    </label>
                                @else
                                    <label class="input-file">
                                        <input type="file" name="img">
                                        <span id="file-name">Файл не выбран</span>
                                    </label>
                                    <img src="{{ $contact->img }}">
                                @endif
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
