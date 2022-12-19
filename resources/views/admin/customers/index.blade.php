@extends('adminlte::page')

@section('title', 'Administrador - Clientes')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Lista de Clientes</h1>
        <a class="btn btn-primary" href="{{ route('admin.customers.create') }}">
            <i class="fas fa-plus"></i>
            Nuevo Cliente
        </a>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered" id="customers">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Cliente</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Dirección</th>
                        <th>Provincia</th>
                        <th>Sector</th>
                        <th>Accion</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($customers as $customer)
                    <tr>
                        <td>
                            {{ $customer->id }}
                        </td>
                        <td>
                            {{ $customer->firstname }} {{ $customer->lastname}}
                        </td>
                        <td>
                            {{ $customer->email }}
                        </td>
                        <td>
                            {{ $customer->phone }}
                        </td>
                        <td>
                            {{ $customer->address }}
                        </td>
                        <td>
                            {{ $customer->province }}
                        </td>
                        <td>
                            {{ $customer->area }}
                        </td>
                        <td>
                            <div class="d-flex justify-content-around align-items-center">
                                <a href="/admin/customers/{{$customer->id}}/edit" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                         
                         
                                <form action="{{route('admin.customers.destroy', [ 'customer' => $customer->id])}}" method="POST" class="d-inline delete-form">
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
                'El cliente ha sido registrado con éxito.',
                'success'
            )
        </script>
    @endif

    @if (session('update') == 'ok')
        <script>
            Swal.fire(
                'Actualizado!',
                'El cliente ha sido actualizó con éxito.',
                'success'
            )
        </script>
    @endif

    @if (session('delete') == 'ok')
        <script>
            Swal.fire(
                'Eliminado!',
                'El cliente ha sido eliminado con éxito.',
                'success'
            )
        </script>
    @endif

    <script>
       $(document).ready(function () {
            $('#customers').DataTable({
                responsive: true,
                autoWidth: false
            });

            $('.delete-form').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Si elimina este cliente todas sus citas serán removidas!",
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
