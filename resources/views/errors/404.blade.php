@extends('layouts.front')

@section('content')
    <main class="error">
        <the-menu simple="simple"></the-menu>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 col-sm-8 offset-sm-2">
                    <img src="/img/common/404.svg" class="error__img">
                    <h1>Страница не найдена</h1>
                    <p>Возможно, у вас опечатка в адресе страницы,
                        или её просто не существует.</p>
                    <a href="/" class="button">Вернуться на главную</a>
                </div>
            </div>
        </div>
    </main>
@endsection
