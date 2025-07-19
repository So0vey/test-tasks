@extends('index')
@section('title', 'Заказы')
@section('orderPageState', 'active')
@section('content')
    <h1>Содержимое заказа №{{$order->id}}:</h1>
    <a href="{{route('ordersPage')}}" class="btn btn-primary">Назад</a>
    @include('pages.orders.orderTable')
@endsection
