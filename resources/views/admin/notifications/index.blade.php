@extends('adminlte::page')

@section('title', 'Administrador - Citas')

@section('content_header')
    <h3>Notificaciones</h3>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Notificaciones no leidas</div>
                    <div class="card-body">
                        @if (auth()->user())
                            @forelse ($appointmentNotifications as $notification)
                                <div class="alert alert-default-warning">
                                    <p class="text-capitalize">{{ $notification->data['title']}}</p>
                                    <p class="text-sm">{{$notification->created_at->diffForHumans()}}</p>
                                    <button class="btn btn-sm btn-dark mark-as-read" data-id="{{ $notification->id }}">Marcar como leido</button>
                                </div>

                                @if ($loop->last)
                                    <a href="" id="mark-all">Marcar todos como leidos</a>
                                @endif
                            @empty
                                No hay notificaciones
                            @endforelse
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        function sendMarkRequest(id = null) {
            return $.ajax("{{ route('admin.notifications.markNotifications') }}", {
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    id
                }
            })
        }

        $(function() {
            $('.mark-as-read').click(function() {
                let request = sendMarkRequest($(this).data('id'));

                request.done(() => {
                    $(this).parents('div.alert').remove();
                });
            })

            $('#mark-all').click(function() {
                let request = sendMarkRequest();

                request.done(() => {
                    $('div.alert').remove();
                });
            })
        })
    </script>
@endsection