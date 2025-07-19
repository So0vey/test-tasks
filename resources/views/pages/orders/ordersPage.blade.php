@extends('index')
@section('title', 'Заказы')
@section('orderPageState', 'active')
@section('content')
    <h1>Список всех заказов:</h1>

    <div class="mb-3">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createOrderModal">Создать заказ</button>
    </div>

    @include('pages.orders.ordersTable')

    @include('pages.orders.ordersModal')
@endsection
