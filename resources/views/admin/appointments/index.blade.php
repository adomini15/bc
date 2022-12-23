@extends('adminlte::page')

@section('title', 'Administrador - Citas')


@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Historial de Citas</h1>
        <a class="btn btn-primary" href="{{ route('admin.appointments.create') }}">
            <i class="fas fa-plus"></i>
            Nueva Cita
        </a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @php
                $heads = [
                    "ID",
                    "Nombre del Cliente",
                    "Telefono",
                    "Fecha de Cita",
                    "Hora de Cita",
                    "Tipo de Cita",
                    ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
                ];
            @endphp

            <x-adminlte-datatable id="appointments-table" :heads="$heads" class="bg-light" striped hoverable with-buttons>
                
                @foreach($appointments as $appointment)
                    <tr>
                        <td>
                            {{ $appointment->id }}
                        </td>
                        <td>
                            {{ $appointment->customer->firstname }} {{ $appointment->customer->lastname}}
                        </td>
                        <td>
                            {{ $appointment->customer->phone }}
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($appointment->taken_date)->format('d/m/Y') }}
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($appointment->taken_date)->format('g:i A') }}
                        </td>
                        <td>
                            {{ $appointment->service->title }}
                        </td>
                        <td>
                            <div class="d-flex justify-content-around align-items-center">
                                <a href="/admin/appointments/{{$appointment->id}}/edit" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                        
                                <form action="{{route('admin.appointments.destroy', [ 'appointment' => $appointment->id])}}" method="POST" class="d-inline delete-form">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>

@endsection

@section('js')
    @if (session('store') == 'ok')
        <script>
            Swal.fire(
                'Creado!',
                'La cita ha sido creado con éxito.',
                'success'
            )
        </script>
    @endif

    @if (session('update') == 'ok')
        <script>
            Swal.fire(
                'Actualizado!',
                'La cita se ha actualizó con éxito.',
                'success'
            )
        </script>
    @endif

    @if (session('delete') == 'ok')
        <script>
            Swal.fire(
                'Eliminado!',
                'La cita se eliminó con éxito.',
                'success'
            )
        </script>
    @endif

    <script>
       $(document).ready(function () {
            $('.delete-form').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Esta cita se eliminara definitivamente!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d9534f',
                    cancelButtonColor: '#292b2c',
                    confirmButtonText: '¡Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        this.submit()
                    }
                })
            });
        });
       
    </script>
@endsection
