@extends('layouts.plantillaHome')

@section('title', 'Usuarios')

@section('content')

    <div class="container py-5 table-responsive">

        <!-- modal para la creaacion de un usuario -->
        <div class="d-flex mb-0 justify-content-end py-5">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary shadow rounded" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop" data-mdb-ripple-init>
                Nuevo usuario
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog text-center">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <h1 class="modal-title fw-bold text-uppercase" id="staticBackdropLabel">
                                Registro</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="card-body p-4">

                            <form  action="{{ route('usuarios.store') }}" method="POST" class="row g-3 needs-validation"
                                novalidate>
                                @csrf
                                <div class="mb-md-4 mt-md-3 pb-3">

                                    <div class="form-outline form-white mb-2">
                                        <input name="name" type="text" id="name"
                                            class="form-control form-control-lg shadow-lg" id="validationCustomUsername"
                                            aria-describedby="inputGroupPrepend" required value="{{ old('name') }}" />
                                        <label class="form-label" for="name">Nombre</label>
                                        <div class="invalid-feedback">
                                            Por favor ingrese un nombre valido
                                        </div>
                                    </div>



                                    <div class="form-outline form-white mb-2">
                                        <input name="email" type="email" id="email"
                                            class="form-control form-control-lg shadow-lg" value="{{ old('email') }}"
                                            id="validationEmail" aria-describedby="inputGroupPrepend" required />
                                        <label class="form-label" for="email">Email</label>
                                        <div class="invalid-feedback">
                                            Correo electronico invalido.
                                        </div>
                                    </div>



                                    <div class="form-outline form-white mb-4">

                                        <select name="role_id" class="form-select form-select-lg  shadow fs-5"
                                            required>
                                            <option selected value="">Elija un rol</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>


                                        <div class="invalid-feedback">
                                            Por favor seleccione un rol.
                                        </div>
                                    </div>

                                    <div data-mdb-input-init class="form-outline form-white mb-2">
                                        <input name="password" type="password" id="password"
                                            class="form-control form-control-lg shadow-lg" required />
                                        <label class="form-label" for="password">Contraseña</label>
                                        <br>
                                        @error('password')
                                            <br>
                                            <span class="text-danger">*{{ $message }}</span>
                                            <br>
                                        @enderror
                                    </div>


                                    <div data-mdb-input-init class="form-outline form-white mb-2">
                                        <input name="password_confirmation" type="password" id="password_confirmation"
                                            class="form-control form-control-lg shadow-lg" required />
                                        <label class="form-label" for="password_confirmation">Confirmar
                                            contraseña</label>
                                        <br>
                                        @error('password_confirmation')
                                            <br>
                                            <span class="text-danger">*{{ $message }}</span>
                                            <br>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Añadir Usuario</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <table class="table caption-top">
            <caption class="h2">Lista de usuarios</caption>
            <thead>
                <tr class="table-primary">
                    <th>#</th>
                    <th>Nombres</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        <!-- Ajusta las columnas según los campos de tu tabla de usuarios -->
                        <td>
                            <div class="d-flex">
                                <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger me-1 shadow"
                                        onclick="return confirm('¿Está seguro de que desea eliminar este usuario?')"
                                        data-mdb-ripple-init>Eliminar</button>
                                </form>

                                <!-- modal para la edicion de un usuario -->
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning shadow rounded" data-bs-toggle="modal"
                                    data-bs-target="#editUserModal{{ $user->id }}" data-mdb-ripple-init>
                                    Editar
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="editUserModal{{ $user->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog text-center">
                                        <div class="modal-content text-center">
                                            <div class="modal-header">
                                                <h1 class="modal-title fw-bold text-uppercase" id="staticBackdropLabel">
                                                    Registro</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="card-body p-4">

                                                <form action="{{ route('usuarios.update', $user->id) }}" method="POST"
                                                    class="row g-3 needs-validation" novalidate>
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-md-4 mt-md-3 pb-3">

                                                        <div class="form-outline form-white mb-2">
                                                            <input name="name" type="text" id="name"
                                                                class="form-control form-control-lg shadow-lg"
                                                                id="validationCustomUsername"
                                                                aria-describedby="inputGroupPrepend" required
                                                                value="{{ $user->name }}" />
                                                            <label class="form-label" for="name">Nombre</label>
                                                            <div class="invalid-feedback">
                                                                Por favor ingrese un nombre valido
                                                            </div>
                                                        </div>



                                                        <div class="form-outline form-white mb-2">
                                                            <input name="email" type="email" id="email"
                                                                class="form-control form-control-lg shadow-lg"
                                                                value="{{ $user->email }}" id="validationCustomUsername"
                                                                aria-describedby="inputGroupPrepend" required />
                                                            <label class="form-label" for="email">Email</label>
                                                            <div class="invalid-feedback">
                                                                Por favor escriba un nombre valido.
                                                            </div>
                                                        </div>



                                                        <div class="form-outline form-white mb-4">

                                                            <select name="role"
                                                                class="form-select form-select-lg  shadow fs-5"
                                                                aria-label="Default select example fs-6"
                                                                id="validationCustom04" required>
                                                                <option selected value="">Elija un rol: </option>
                                                                @foreach ($roles as $role)
                                                                    <option value="{{ $role->id }}"
                                                                        {{ $role->id == $user->role_id ? 'selected' : '' }}>
                                                                        {{ $role->name }}</option>
                                                                @endforeach
                                                            </select>

                                                            <div class="invalid-feedback">
                                                                Por favor seleccione un rol.
                                                            </div>
                                                        </div>

                                                        <div data-mdb-input-init class="form-outline form-white mb-2">
                                                            <input name="password" type="password" id="password"
                                                                class="form-control form-control-lg shadow-lg" />
                                                            <label class="form-label" for="password">Contraseña</label>
                                                            <br>
                                                            @error('password')
                                                                <br>
                                                                <span class="text-danger">*{{ $message }}</span>
                                                                <br>
                                                            @enderror
                                                        </div>


                                                        <div data-mdb-input-init class="form-outline form-white mb-2">
                                                            <input name="password_confirmation" type="password"
                                                                id="password_confirmation"
                                                                class="form-control form-control-lg shadow-lg" />
                                                            <label class="form-label"
                                                                for="password_confirmation">Confirmar
                                                                contraseña</label>
                                                            <br>
                                                            @error('password_confirmation')
                                                                <br>
                                                                <span class="text-danger">*{{ $message }}</span>
                                                                <br>
                                                            @enderror
                                                        </div>

                                                        <div class="col-12">
                                                            <button class="btn btn-primary" type="submit">Editar usuario</button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}90
    </div>




@endsection
