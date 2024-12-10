<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />



    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!--Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/estilos.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.umd.min.js"></script>


<body>
    <nav class="navbar navbar-dark bg-primary bg-opacity-75 fixed-top shadow">
        <div class="container-fluid">
            <button class="navbar-toggler order-0 shadow" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" fill="white" class="bi bi-list"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                </svg>
            </button>





            <button
                class="ms-auto nav-item dropdown d-flex align-items-center text-decoration-none btn btn-outline-light shadow"
                href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <h4 class="me-2 mb-0 fs-4 text-capitalize">{{ Auth::user()->name }}</h4>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg>
            </button>




            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-light shadow-lg"
                aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item text-primary" href="{{ route('cerrarsesion') }}">Cerrar sesión</a></li>
                <li><a class="dropdown-item text-primary" href="{{ route('perfil.index') }}">Editar perfil</a></li>
            </ul>


            <!-- sidebar -->
            <div class="offcanvas offcanvas-start custom-offcanvas" tabindex="-1" id="offcanvasDarkNavbar"
                aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header mb-5">
                    <h2 class="offcanvas-title text-light" id="offcanvasDarkNavbarLabel">Menú principal</h5>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav">
                        <li class="nav-item mb-2">
                            <a class="nav-link d-flex align-items-center {{ request()->routeIs('home') ? 'active' : '' }}"
                                aria-current="page" href="{{ route('home') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    fill="currentColor" class="bi bi-house-door-fill me-3 mb-0" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
                                </svg>
                                <p class="h2 mb-0">Home</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-2 {{ request()->routeIs('usuarios.index') ? 'active' : '' }}"
                                href="{{ route('usuarios.index') }}">Usuarios</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ms-2 {{ request()->routeIs('roles.index') ? 'active' : '' }}"
                                href="{{ route('roles.index') }}">Roles</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ms-2 {{ request()->routeIs('perfil.index') ? 'active' : '' }}"
                                href="{{ route('perfil.index') }}">Perfil</a>
                        </li>
                        <hr>
                        <li class="nav-item mb-2">
                            <a class="nav-link d-flex align-items-center {{ request()->routeIs('inventario.index') ? 'active' : '' }}"
                                aria-current="page" href="{{ route('inventario.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    fill="currentColor" class="bi bi-shop-window me-3 mb-0" viewBox="0 0 16 16">
                                    <path
                                        d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5m2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5" />
                                </svg>
                                <p class="h2 mb-0">Inventario</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ms-2 {{ request()->routeIs('categorias.index') ? 'active' : '' }}"
                                href="{{ route('categorias.index') }}">Categoria</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ms-2 {{ request()->routeIs('productos.index') ? 'active' : '' }}"
                                href="{{ route('productos.index') }}">Productos</a>
                        </li>
                    </ul>
                </div>
                <button class="navbar-toggler d-sm-block d-md-none" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                    <i class="fas fa-circle-xmark text-white display-6"></i>
                </button>

            </div>
        </div>
    </nav>


    @yield('content')




    <!-- MDB -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>

    <script>
        $(document).ready(function() {
            // Escucha el evento de envío del formulario de creación
            $('#createForm').submit(function(event) {
                // Evita el envío del formulario por defecto
                event.preventDefault();

                // Obtiene los datos del formulario
                var formData = $(this).serialize();

                // Realiza una solicitud AJAX POST para crear un nuevo rol
                $.ajax({
                    url: "{{ route('roles.store') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        // Actualiza la interfaz de usuario, por ejemplo, recarga la página o actualiza la tabla de roles
                        window.location.reload();
                    },
                    error: function(xhr) {
                        // Maneja errores, por ejemplo, muestra un mensaje de error al usuario
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>


</body>

</html>
