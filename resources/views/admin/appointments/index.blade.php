@extends('adminlte::page')

@section('title', 'Administrador - Citas')

@section('content_header')
    <h1>Historial de Citas</h1>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered" id="appointments">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Cliente</th>
                        <th>Telefono</th>
                        <th>Fecha de Cita</th>
                        <th>Hora de Cita</th>
                        <th>Tipo de Cita</th>
                        <th>Accion</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($appointments as $appointment)
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
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js')
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap4.min.js"></script>


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
            $('#appointments').DataTable({
                responsive: true,
                autoWidth: false
            });

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
