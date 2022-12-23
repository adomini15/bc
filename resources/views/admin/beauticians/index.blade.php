@extends('adminlte::page')

@section('title', 'Administrador - Esteticistas')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Lista de Esteticistas</h1>
        <a class="btn btn-primary" href="{{ route('admin.beauticians.create') }}">
            <i class="fas fa-plus"></i>
            Nuevo Esteticista
        </a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            @php
                $heads = [
                    "ID",
                    "Nombre",
                    "Apellido",
                    "Descripción",
                    ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
                ];
            @endphp

            <x-adminlte-datatable id="beauticians-table" :heads="$heads" class="bg-light" striped hoverable with-buttons>
                @foreach ($beauticians as $beautician)
                    <tr>
                        <td>
                            {{ $beautician->id }}
                        </td>
                        <td>
                            {{ $beautician->firstname }}
                        </td>
                        <td>
                            {{ $beautician->lastname }}
                        </td>
                        <td>
                            {{ $beautician->description }}
                        </td>
                        <td>
                            <div class="d-flex justify-content-around align-items-center">
                                <a href="/admin/beauticians/{{$beautician->id}}/edit" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                            
                            
                                <form action="{{route('admin.beauticians.destroy', [ 'beautician' => $beautician->id])}}" method="POST" class="d-inline delete-form">
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
                'El esteticista ha sido registado con éxito.',
                'success'
            )
        </script>
    @endif

    @if (session('update') == 'ok')
        <script>
            Swal.fire(
                'Actualizado!',
                'El esteticista ha sido actualizó con éxito.',
                'success'
            )
        </script>
    @endif

    @if (session('delete') == 'ok')
        <script>
            Swal.fire(
                'Eliminado!',
                'El esteticista se ha eliminado con éxito.',
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
                    text: "Si elimina este esteticista todas las citas dependientes se cancelarán!",
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
