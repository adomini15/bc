@extends('adminlte::page')

@section('title', 'Administrador - Servicios')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Lista de Servicios</h1>
        <a class="btn btn-primary" href="{{ route('admin.services.create') }}">
            <i class="fas fa-plus"></i>
            Nuevo Servicio
        </a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @php
                $heads = [
                    "ID",
                    "Título",
                    "Descripción",
                    "Precio",
                    ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
                ];
            @endphp

            <x-adminlte-datatable id="services-table" :heads="$heads" class="bg-light" striped hoverable with-buttons>
                @foreach ($services as $service)
                    <tr>
                        <td>
                            {{ $service->id }}
                        </td>
                        <td>
                            {{ $service->title }}
                        </td>
                        <td>
                            {{ $service->description }}
                        </td>
                        <td>
                            {{ $service->price }}
                        </td>
                        <td>
                            <div class="d-flex justify-content-around align-items-center">
                                <a href="/admin/services/{{$service->id}}/edit" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                        
                        
                                <form action="{{route('admin.services.destroy', [ 'service' => $service->id])}}" method="POST" class="d-inline delete-form">
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
                'El servicio ha sido creado con éxito.',
                'success'
            )
        </script>
    @endif

    @if (session('update') == 'ok')
        <script>
            Swal.fire(
                'Actualizado!',
                'El servicio ha sido actualizó con éxito.',
                'success'
            )
        </script>
    @endif

    @if (session('delete') == 'ok')
        <script>
            Swal.fire(
                'Eliminado!',
                'El servicio ha sido eliminado con éxito.',
                'success'
            )
        </script>
    @endif

    <script>
       $(document).ready(function () {
            $('#services').DataTable({
                responsive: true,
                autoWidth: false
            });

            $('.delete-form').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Si elimina este servicio todas las citas dependientes se cancelarán!",
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
