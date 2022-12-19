@extends('adminlte::page')

@section('title', 'Administrador - Editar Esteticista')

@section('content_header')
    <h1>Editar Esteticista</h1>
@stop

@section('content')
    <livewire:edit-beautician-form :beautician="$beautician"  />
@endsection


@livewireScripts