@extends('index')
@section('title', 'Главная')
@section('warehousesPageState', 'active')
@section('content')
    <h1>Содержимое склада "{{$warehouse->name}}"</h1>
    <a href="{{route('warehousesPage')}}" class="btn btn-primary">Назад</a>
    @include('pages.warehouses.warehouseStockTable')
@endsection
