@extends('index')
@section('title', 'Главная')
@section('warehousesPageState', 'active')
@section('content')
    <h1>Список наших складов:</h1>
    @include('pages.warehouses.warehousesTable')
@endsection
