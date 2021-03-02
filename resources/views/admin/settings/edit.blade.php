@extends('layouts.app')

@section('content')
    @include('admin.parts.navigation-settings')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @if($setting->exists)
                    <form class="js-validation-form" action="{{route('admin.settings.update', ['setting' => $setting])}}" enctype="multipart/form-data" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h2><a href="{{route('admin.settings.index')}}"><i class="fas fa-chevron-left"></i> {{ $setting->name }}</a></h2>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>
                        <label>
                            <textarea>{{$setting->value}}</textarea>
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" name="state" value="1" {{ $setting->state ? 'checked="checked"' : '' }}>
                            <div class="checkbox__text">Состояние</div>
                        </label>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
