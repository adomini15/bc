@extends('adminlte::page')

@section('title', 'Administrador - Editar Cliente')

@section('content_header')
    <h1>Editar Cliente</h1>
@stop

@section('content')
    <livewire:edit-customer-form :customer="$customer"  />
@endsection


@livewireScripts