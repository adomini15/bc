@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Estadístico - Tablero</h1>
@stop


@section('content')
    <p>Visualice el estado de resultados de los servicios, citas y clientes.</p>
    <div class="row">
        <div class="col">
            <x-adminlte-small-box title="{{$numberOfAliveCustomers}}" text="Clientes activos" icon="fas fa-users text-white"
            theme="primary" url="/admin/customers" url-text="Ver todos los clientes" />
        </div>
       
        <div class="col">
            <x-adminlte-small-box title="{{$numberOfAliveAppointments}}" text="Citas activas" icon="fas fa-calendar text-white"
            theme="purple" url="/admin/appointments" url-text="Ver historial" />
        </div>

       <div class="col">
         <x-adminlte-small-box title="{{$numberOfAvailableServices}}" text="Servicios disponibles" icon="fas fa-wrench text-white"
            theme="info" url="/admin/services" url-text="Ver todos los servicios" />
       </div>
       
    </div>

    <div class="row">
        <div class="col">
            <x-adminlte-info-box title="Clientes" text="{{$percentOfTrashedCustomers}}/100" icon="fas fa-lg fa-running text-white" theme="danger"
            progress="{{$percentOfTrashedCustomers}}" progress-theme="white"
            description="Un {{$percentOfTrashedCustomers}}% de clientes han abandonado el sitio"/>
        </div>
        
        <div class="col">
            <x-adminlte-info-box title="Citas" text="{{$percentOfTrashedAppointments}}/100" icon="fas fa-lg fa-tasks text-white" theme="danger"
            progress="{{$percentOfTrashedAppointments}}" progress-theme="white"
            description="El {{$percentOfTrashedAppointments}}% de las citas han sido canceladas"/>
        </div>
    </div>

    
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop


