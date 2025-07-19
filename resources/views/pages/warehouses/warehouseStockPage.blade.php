@extends('index')
@section('title', 'Склады')
@section('warehousesPageState', 'active')
@section('content')
    <h1>Содержимое склада "{{$warehouse->name}}"</h1>

    <div class="mb-3">
        <a href="{{route('warehousesPage')}}" class="btn btn-primary">Назад</a>
    </div>

    @include('pages.warehouses.warehouseStockTable')
@endsection
