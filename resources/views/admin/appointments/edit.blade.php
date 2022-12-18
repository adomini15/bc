@extends('adminlte::page')

@section('title', 'Administrador - Editar Cita')

@section('content_header')
    <h1>Editar Cita</h1>
@stop

@section('content')
    <livewire:edit-appointment-form :appointment="$appointment"  />
@endsection


@livewireScripts