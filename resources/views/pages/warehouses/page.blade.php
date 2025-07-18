@extends('index')
@section('title', 'Главная')
@section('warehousesPageState', 'active')
@section('content')
    <h1>Добро пожаловать!</h1>
    <p>Это основное содержимое вашей страницы. Здесь вы можете разместить любой контент.</p>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Пример карточки</h5>
            <p class="card-text">Некоторый пример текста в карточке. Вы можете использовать различные компоненты
                Bootstrap для оформления контента.</p>
            <a href="#" class="btn btn-primary">Кнопка</a>
        </div>
    </div>
@endsection
