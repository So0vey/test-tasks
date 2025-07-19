@extends('index')
@section('title', 'Заказы')
@section('orderPageState', 'active')
@section('content')
    <h1>Список всех заказов:</h1>
    @include('pages.orders.ordersTable')
@endsection
