@extends('adminlte::page')

@section('title', 'Administrador - Editar Servicio')

@section('content_header')
    <h1>Editar Servicio</h1>
@stop

@section('content')
    <livewire:edit-service-form :service="$service"  />
@endsection


@livewireScripts