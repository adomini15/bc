@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Estadístico - Tablero</h1>
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
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

    <div class="card card-light">
        <div class="card-header">
            <h3 class="card-title">Citas</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="chart">
                <canvas id="bar-chart" width="800" height="450"></canvas>
            </div>
        </div>
    </div>

    
@stop

@section('js')
    <script>

        const trashed =  @json($numberOfTrashedAppointmentsForMonths);
        const alive = @json($numberOfAliveAppointmentsForMonths);

            
        const barChart = $('#bar-chart').get(0).getContext('2d')

        const labels = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

        const data = {
            labels,
            datasets: [{
                label: 'Canceladas',
                data: labels.map((value, index) => trashed[index + 1] ?? 0),
                backgroundColor: 'rgba(255, 26, 104, 0.2)',
                borderColor: 'rgba(255, 26, 104, 1)',
                borderWidth: 1
            },
            {
                label: 'Activas',
                data: labels.map((value, index) => alive[index + 1] ?? 0),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

    // config 
    const config = {
      type: 'bar',
      data,
      options: {
        scales: {
            yAxes: [{
                ticks: {
                    stepSize: 1
                }
            }]
        }
      }
    };

    // render init block
    new Chart(
        barChart,
        config
    );
    </script>
@endsection



