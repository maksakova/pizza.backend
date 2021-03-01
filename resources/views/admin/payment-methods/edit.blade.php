@extends('layouts.app')

@section('content')
    @include('admin.parts.navigation-delivery')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @if($paymentMethod->exists)
                    <form class="js-validation-form" action="{{route('admin.payment-methods.update', ['payment_method' => $paymentMethod])}}" enctype="multipart/form-data" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h2><a href="{{route('admin.payment-methods.index')}}"><i class="fas fa-chevron-left"></i> {{$paymentMethod->name}}</a></h2>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Удалить</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>
                                    Название
                                    <input type="text" name="name" value="{{$paymentMethod->name}}">
                                </label>
                                <label class="checkbox">
                                    <input
                                        type="checkbox"
                                        name="active" value="1"
                                        @if($paymentMethod->active == 1) checked @endif>
                                    <div class="checkbox__text">Доступен</div>
                                </label>
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
                                <form method="POST" action="{{ route('admin.payment-methods.destroy', $paymentMethod->id) }}">
                                    <div class="modal-body">
                                        @method('DELETE')
                                        @csrf
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                Вы действительно хотите удалить метод доставки?
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
                    <form method="POST" action="{{ route('admin.payment-methods.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h2><a href="{{route('admin.payment-methods.index')}}"><i class="fas fa-chevron-left"></i> Новая акция</a></h2>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>
                                    Название
                                    <input type="text" name="name" value="{{$paymentMethod->name}}">
                                </label>
                                <label class="checkbox">
                                    <input
                                        type="checkbox"
                                        name="active" value="1"
                                        @if($paymentMethod->active == 1) checked @endif>
                                    <div class="checkbox__text">Доступен</div>
                                </label>
                            </div>
                        </div>
                        <label>
                            Описание
                            <textarea name="content">{{$paymentMethod->content}}</textarea>
                        </label>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
