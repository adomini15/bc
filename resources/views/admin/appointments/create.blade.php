@extends('adminlte::page')

@section('title', 'Administrador - Crear Cita')

@section('content_header')
    <h1>Crear Cita</h1>
@stop

@section('content')
    <livewire:create-appointment-form>
   
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(document).ready(function() {
            $("#taken_date").flatpickr(optional_config);
        });
    </script>
@endsection


@livewireScripts




