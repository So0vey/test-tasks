@extends('index')
@section('title', 'Заказы')
@section('orderPageState', 'active')
@section('content')
    <h1>Содержимое заказа №{{$order->id}}:</h1>

    <div class="mb-3">
        <a href="{{route('ordersPage')}}" class="btn btn-primary">Назад</a>
        @if($order->status != 'completed')
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editOrderModal">Редактировать заказ</button>
        @endif
    </div>

    @include('pages.orders.orderTable')

    @if($order->status != 'completed')
        @include('pages.orders.orderEditModal')
    @endif
@endsection
