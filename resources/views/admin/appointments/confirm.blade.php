<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Cita</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div id="confirmation" class="d-none">
        <div  class="vh-100 d-flex justify-content-center align-items-center">
            <div class="col-md-4" data-content>
                <div class="border border-3 border-success"></div>
                <div class="card  bg-white shadow p-5">
                    <div class="mb-4 text-center text-success h1">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <div class="text-center">
                        <h3>¡Confirmada!</h3>
                        <p>Tu cita ya se encuentra confirmada en nuestra agenta.</p>
                        <a href="/" class="btn btn-outline-success btn-sm">Ir a la página pricipal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="{{ url('/vendor/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
    
    <script>
        $(document).ready(function () {
            const confirmation = $('#confirmation');


            if("{{$isConfirmed}}") {
                confirmation.removeClass('d-none');
            } else {
                showModal(confirmAppointment, cancelAppointment);
            }

            async function confirmAppointment(appointmentId) {
                return new Promise(function (resolve, reject) {
                    $.ajax({
                        url: "{{ route('admin.appointments.confirmed') }}",
                        type: "POST",
                        data: {
                            id: appointmentId,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "JSON",
                        success: resolve,
                        error: reject
                    })
                });
            }

            async function cancelAppointment(appointmentId) {
                return new Promise(function (resolve, reject) {
                    $.ajax({
                        url: "{{ route('admin.appointments.cancel') }}",
                        type: "delete",
                        data: {
                            id: appointmentId,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "JSON",
                        success: resolve,
                        error: reject
                    })
                });
            }

            async function showModal(cbConfirm, cbCancel) {
                try {
                    const result = await Swal.fire({
                        title: '¿Deseas confirmar esta cita?',
                        text: "Esta cita será confirmada definitivamente!",
                        showCancelButton: true,
                        confirmButtonColor: '#0275d8',
                        cancelButtonColor: '#292b2c',
                        confirmButtonText: '¡Si, confirmar cita!',
                        cancelButtonText: 'Cancelar',
                        imageUrl: 'https://img.freepik.com/free-vector/hand-with-pen-marking-dates-calendar-flat-vector-illustration-person-scheduling-planning-time-meetings-time-management-arrangement-concept-banner-website-design-landing-web-page_74855-26024.jpg?w=1060&t=st=1671642539~exp=1671643139~hmac=dcff18aeda79fa729b6f2aeeb0bb350eb2840fb4bba257a1716ff1fcb053fc71',
                        imageHeight: 250,
                        showLoaderOnConfirm: true
                    });

                    if(result.value) {
                        await cbConfirm("{{$appointmentId}}");
                    } else {
                        await cbCancel("{{$appointmentId}}");
                        $('.text-success').addClass('text-danger').removeClass('text-success');
                        $('.border-success').addClass('border-danger').removeClass('border-success');
                        $('.btn-outline-success').addClass('btn-outline-danger').removeClass('btn-outline-success');
                        $('.fa-check').addClass('fa-ban').removeClass('fa-check');
                        $('h3').text('!Cancelado!');
                        $('p').text('Tu cita ha sido cancelada');
                    }

                    confirmation.removeClass('d-none');

                } catch (error) {
                    console.log(error);
                }
            }
            

        });
    </script>

</body>
</html>
