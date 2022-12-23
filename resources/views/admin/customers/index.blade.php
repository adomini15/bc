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

@section('content')
    <div class="card">
        <div class="card-body">
            @php
                $heads = [
                    "ID",
                    "Nombre del Cliente",
                    "Email",
                    "Teléfono",
                    "Dirección",
                    "Provincia",
                    "Sector",
                    ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
                ];
            @endphp
            
            <x-adminlte-datatable id="customers-table" :heads="$heads" class="bg-light" striped hoverable with-buttons>
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
            </x-adminlte-datatable>
  
        </div>
    </div>

@endsection

@section('js')
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
