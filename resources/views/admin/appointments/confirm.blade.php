<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Cita</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <div id="confirmation" class="d-none">
        <div  class="vh-100 d-flex justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="border border-3 border-success"></div>
                <div class="card  bg-white shadow p-5">
                    <div class="mb-4 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75"
                            fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                        </svg>
                    </div>
                    <div class="text-center">
                        <h1>¡Confirmado!</h1>
                        <p>Tu cita ya esta asignada en la agenda de clientes.</p>
                        <a href="/" class="btn btn-outline-success">Ir a la página pricipal</a>
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
                showModal(confirmAppointment);
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

            async function showModal(done) {
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
                        showLoaderOnConfirm: true,
                        preConfirm: async () => {
                            return done("{{$appointmentId}}");
                        }
                    });

                    if(result.isConfirmed) {
                        confirmation.removeClass('d-none');
                    }

                } catch (error) {
                    console.log(error);
                }
            }
            

        });
    </script>

</body>
</html>
