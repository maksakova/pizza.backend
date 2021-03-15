@extends('layouts.app')

@section('content')
    @include('admin.parts.navigation-orders')
    <div class="container">
        <div class="card">
            @if($order->exists)
                <form class="js-validation-form" action="{{route('admin.orders.update', ['order' => $order])}}" enctype="multipart/form-data" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h2><a href="{{route('admin.orders.index')}}"><i class="fas fa-chevron-left"></i> {{ $order->name }}</a></h2>
                            </div>
                            @if($order->status_id < 4)
                                <div class="col-sm-6 text-right">
                                    <button class="btn btn-primary">Сохранить</button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        @if($order->status_id == 1)
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>
                                        Статус
                                        <select name="status_id">
                                            @foreach($orderStatuses as $status)
                                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                    <label>
                                        Имя
                                        <input type="text" name="name" value="{{$order->name}}">
                                    </label>
                                    <label>
                                        Телефон
                                        @if($order->callback)
                                            (Не перезванивать)
                                        @endif
                                        <input type="text" name="phone" value="{{$order->phone}}">
                                    </label>
                                    <label>
                                        Способ доставки
                                        <select name="delivery_method">
                                            @foreach($deliveryMethods as $deliveryMethod)
                                                @if($order->delivery_method == $deliveryMethod->id)
                                                <option value="{{ $deliveryMethod->id }}" selected>{{ $deliveryMethod->name }}</option>
                                                @else
                                                    <option value="{{ $deliveryMethod->id }}">{{ $deliveryMethod->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </label>
                                    <label>
                                        Способ оплаты
                                        <select name="payment_method">
                                            @foreach($paymentMethods as $paymentMethod)
                                                @if($order->payment_method == $paymentMethod->id)
                                                    <option value="{{ $paymentMethod->id }}" selected>{{ $paymentMethod->name }}</option>
                                                @else
                                                    <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </label>
                                    @if($order->payment_method == 1)
                                        <label>
                                            Сдача
                                            <input type="text" name="cashback" value="{{$order->cashback}}">
                                        </label>
                                    @else
                                        <label>
                                            Номер оплаты
                                            <input type="text" name="cashback" value="{{$order->payment_status}}" disabled>
                                        </label>
                                        @if($transaction !== null)
                                            <label>
                                                Статус
                                                <input type="text" name="cashback" value="{{$transaction}}" disabled>
                                            </label>
                                        @endif
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label>
                                        Улица
                                        <input type="text" name="street" value="{{$order->street}}">
                                    </label>
                                    <label>
                                        Дом
                                        <input type="text" name="building" value="{{$order->building}}">
                                    </label>
                                    <label>
                                        Квартира / офис
                                        <input type="text" name="flat" value="{{$order->flat}}">
                                    </label>
                                    <label>
                                        Подъезд
                                        <input type="text" name="entrance" value="{{$order->entrance}}">
                                    </label>
                                    <label>
                                        Этаж
                                        <input type="text" name="floor" value="{{$order->floor}}">
                                    </label>
                                    <label>
                                        Код домофона
                                        <input type="text" name="code" value="{{$order->code}}">
                                    </label>
                                    <label>
                                        Комментарий
                                        <input type="text" name="comment" value="{{$order->comment}}">
                                    </label>
                                </div>
                            </div>
                            <h2>Позиции</h2>
                            <div class="table-outer">
                        <table class="table table-hover">
                            <tr>
                                <th>№</th>
                                <th>Название</th>
                                <th>Выбрано</th>
                                <th>Добавки</th>
                                <th>Цена</th>
                            </tr>
                            @foreach($orderProducts as $key=>$orderProduct)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$orderProduct->name}}</td>
                                    <td>
                                        @if(property_exists($orderProduct, 'currentVariant1'))
                                            {{$orderProduct->product_variants[$orderProduct->currentVariant1]->name}}
                                        @endif
                                        @if(property_exists($orderProduct, 'currentVariant2'))
                                                {{$orderProduct->product_variants[$orderProduct->currentVariant2]->name}}
                                        @endif
                                    </td>
                                    <td>
                                        @if(property_exists($orderProduct, 'additives'))
                                            @foreach($orderProduct->additives as $additive)
                                                {{$menuIngredients[$additive - 1]->name}}
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        {{$orderProduct->price}} x {{$orderProduct->quantity}} = {{$orderProduct->price * $orderProduct->quantity}}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <th colspan="4">Итого</th>
                                <th>{{$order->cart_total}}</th>
                            </tr>
                        </table>
                            </div>
                        @else
                            @if($order->status_id < 4)
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>
                                            Статус
                                            <select name="status_id">
                                                @foreach($orderStatuses as $status)
                                                    @if($order->status_id == $status->id)
                                                        <option value="{{ $status->id }}" selected>{{ $status->name }}</option>
                                                    @else
                                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                                </div>
                            @else
                                <p>Статус: {{ $order->status->name }}</p>
                            @endif
                            <div class="table-outer">
                                <table class="table table-hover">
                                    <tr>
                                        <th>№</th>
                                        <th>Название</th>
                                        <th>Выбрано</th>
                                        <th>Добавки</th>
                                        <th>Цена</th>
                                    </tr>
                                    @foreach($orderProducts as $key=>$orderProduct)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$orderProduct->name}}</td>
                                            <td>
                                                @if(property_exists($orderProduct, 'currentVariant1'))
                                                    {{$orderProduct->product_variants[$orderProduct->currentVariant1]->name}}
                                                @endif
                                                @if(property_exists($orderProduct, 'currentVariant2'))
                                                    {{$orderProduct->product_variants[$orderProduct->currentVariant2]->name}}
                                                @endif
                                            </td>
                                            <td>
                                                @if(property_exists($orderProduct, 'additives'))
                                                    @foreach($orderProduct->additives as $additive)
                                                        {{$menuIngredients[$additive - 1]->name}}
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                {{$orderProduct->price}} x {{$orderProduct->quantity}} = {{$orderProduct->price * $orderProduct->quantity}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <br>
                            <p>Сумма: {{ $order->cart_total }} BYN</p>
                            <p>Способ доставки: {{ $order->deliveryMethod->name }}</p>
                            <p>Способ оплаты: {{ $order->paymentMethod->name }}</p>
                            @if($order->cashback)
                                <p>Сдача с: {{ $order->cashback }}</p>
                            @endif
                            <p>Контакты: {{ $order->name }}
                                {{ $order->phone }}
                                {{ $order->email }}</p>
                            <p>Адрес: {{ $order->street }}
                                {{ $order->building }}
                                {{ $order->flat }}
                                {{ $order->entrance }}
                                {{ $order->floor }}
                                {{ $order->code }}</p>
                            @if($order->comment)
                                <p>Комментарий: {{ $order->comment }}</p>
                            @endif
                        @endif
                    </div>
                </form>
            @else
                <form method="POST" action="{{ route('admin.orders.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h2><a href="{{route('admin.orders.index')}}"><i class="fas fa-chevron-left"></i> Новый заказ</a></h2>
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
                                    Статус
                                    <select name="status_id">
                                        @foreach($orderStatuses as $status)
                                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                                <label>
                                    Имя
                                    <input type="text" name="name" value="{{$order->name}}">
                                </label>
                                <label>
                                    Телефон
                                    <input type="text" name="phone" value="{{$order->phone}}">
                                </label>
                                <label>
                                    E-mail
                                    <input type="text" name="email" value="{{$order->email}}">
                                </label>
                                <label>
                                    Способ доставки
                                    <select name="delivery_method">
                                        @foreach($deliveryMethods as $deliveryMethod)
                                            <option value="{{ $deliveryMethod->id }}">{{ $deliveryMethod->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                                <label>
                                    Способ оплаты
                                    <select name="payment_method">
                                        @foreach($paymentMethods as $paymentMethod)
                                            <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                                <label>
                                    Сдача
                                    <input type="text" name="cashback">
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Улица
                                    <input type="text" name="street">
                                </label>
                                <label>
                                    Дом
                                    <input type="text" name="building">
                                </label>
                                <label>
                                    Квартира / офис
                                    <input type="text" name="flat">
                                </label>
                                <label>
                                    Подъезд
                                    <input type="text" name="entrance">
                                </label>
                                <label>
                                    Этаж
                                    <input type="text" name="floor">
                                </label>
                                <label>
                                    Код домофона
                                    <input type="text" name="code">
                                </label>
                                <label>
                                    Комментарий
                                    <input type="text" name="comment">
                                </label>
                            </div>
                        </div>
                        <h2>Позиции</h2>
                        <div class="composition">
                            @foreach($menuProducts as $menuProduct)
                                <label class="checkbox">
                                    <input
                                        type="checkbox"
                                        name="products[]" value="{{$menuProduct->id}}">
                                    <div class="checkbox__text">{{$menuProduct->name}}</div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
