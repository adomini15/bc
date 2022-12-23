<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            .mapouter{
                position:relative;
                text-align:right;
                width:100%;
                height:550px;
            }
            .gmap_canvas {
                overflow:hidden;
                background:none!important;
                width:100%;
                height:550px;
            }
            .gmap_iframe {
                width:100%!important;
                height:550px!important;
            }
        </style>
    </head>
    <body class="antialiased">
        <header class="p-3 text-bg-light">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none ">
                        <img class="rounded-circle" width="40" height="34" src="/vendor/adminlte/dist/img/BeautyCenterLogo.png" alt="">
                    </a>
            
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="/admin/appointments/create" class="nav-link px-2 text-dark">Reservar Cita</a></li>
                        <li><a href="#" class="nav-link px-2 text-dark">Ofertas</a></li>
                        <li><a href="#" class="nav-link px-2 text-dark">Quinenes Somos</a></li>
                        <li><a href="/admin/appointments" class="nav-link px-2 text-dark">Historial</a></li>
                    </ul>
            
                    <div class="text-end">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/admin/appointments/create') }}" class="text-sm btn btn-dark">Reservar Cita</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm btn btn-outline-dark me-2">Iniciar Sesión</a>
                            
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm btn btn-warning">Nueva Cuenta</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="px-4 pt-5 my-5 text-center border-bottom">
                <h1 class="display-4 fw-bold">Beauty Center</h1>
                <div class="col-lg-6 mx-auto">
                    <p class="lead mb-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos autem, 
                        illum vitae animi vel officiis magnam accusantium iure ipsam.
                    </p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                        <button type="button" class="btn btn-dark btn-lg px-4 me-sm-3">Reservar Cita</button>
                    </div>
                </div>
                <div class="overflow-hidden" style="max-height: 30vh;">
                    <div class="container px-5">
                        <img src="/img/hero.png" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
                    </div>
                </div>
                <div class="album py-5 bg-light">
                    <h2 class="pb-4">Conoce Nuetros Servicios</h2>
                    <div class="container">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="/img/image5.png" />
                        
                                    <div class="card-body">
                                        <h5 class="card-title">Masaje reductor</h5>
                                        <p class="card-text">
                                            El objetivo es reducir la acumulación de grasa en zonas específicas de nuestro cuerpo...
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Leer más</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card shadow-sm">
                                    <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="/img/image7.png" />
                        
                                    <div class="card-body">
                                        <h5 class="card-title">Tratamiento facial</h5>
                                        <p class="card-text">
                                            Son procedimientos no invasivos que devuelven la salud y belleza natural a la delicada piel de nuestro rostro..
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Leer más</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card shadow-sm">
                                    <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="/img/forma-de-rostro-mujer-microblading 1.png" />
                        
                                    <div class="card-body">
                                        <h5 class="card-title">Microblading</h5>
                                        <p class="card-text">
                                            Es una técnica de maquillaje permanente para cejas que se realiza utilizando pequeñas agujas...
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Leer más</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card shadow-sm">
                                    <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="/img/image8.png" />
                        
                                    <div class="card-body">
                                        <h5 class="card-title">Depilacion</h5>
                                        <p class="card-text">
                                            Consiste en eliminar el vello de alguna zona del cuerpo, utilizada particularmente por el ser humano.
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Leer más</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="album py-5 bg-dark text-white">
                    <h2 class="pb-4">Nuestro personal detrás del buen servicio que brindamos a nuestros clientes</h2>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                              <img src="/img/Photo by Gabriela Netto on Unsplash.png" class="bd-placeholder-img rounded-circle text-center" width="140" height="140" />
                              <h4>Roberta</h4>
                              <p>Esteticista</p>
                            </div>
                            <div class="col-lg-4">
                                <img src="/img/Photo by rawpixel on Unsplash 2.png" class="bd-placeholder-img rounded-circle text-center" width="140" height="140" />
                                <h4>Marcela</h4>
                                <p>Masajista</p>
                            </div>
                            <div class="col-lg-4">
                                <img src="/img/Photo by Miguel Bruna on Unsplash.png" class="bd-placeholder-img rounded-circle text-center" width="140" height="140" />
                                <h4>Andrea</h4>
                                <p>Encargada</p>
                            </div>
                        </div>
                        <div class="row">
                            
                        </div>
                        <div class="row">
                            
                        </div>
                    </div>
                </div>
                <div class="pt-5 bg-light text-dark">
                    <h2 class="pb-4">Conoce Nuestras Instalaciones</h2>
                    <div style="width:100%">
                        <div class="mapouter">
                            <div class="gmap_canvas">
                                <iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=1281&amp;height=550&amp;hl=en&amp;q=autopista san isidro&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
              
                <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4">
                    <div class="col-md-4 d-flex align-items-center">
                        <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                        <img src="/vendor/adminlte/dist/img/BeautyCenterLogo.png" class="bi rounded-circle" width="30" height="24" />
                        </a>
                        <span class="mb-3 mb-md-0 text-muted">© 2022 Beauty Center, Inc</span>
                    </div>
                
                    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                        <li class="ms-3">
                            <a class="text-muted" href="#">
                                <i class="fa-brands fa-twitter" style="font-size:24px; color:#1da1f2;"></i>
                            </a>
                        </li>
                        <li class="ms-3">
                            <a class="text-muted" href="#">
                                <i class="fa-brands fa-facebook" style="font-size:24px; color:#1877f2;"></i>
                            </a>
                        </li>
                        <li class="ms-3">
                            <a class="text-muted" href="#">
                                <i class="fa-brands fa-instagram" style="font-size:24px; color: #c32aa3;"></i>
                            </a>
                        </li>
                        <li class="ms-3">
                            <a class="text-muted" href="#">
                                <i class="fa-brands fa-pinterest" style="font-size:24px; color: #bd081c;"></i>
                            </a>
                        </li>
                    </ul>
                </footer>
            
        </main>
    </body>
</html>
