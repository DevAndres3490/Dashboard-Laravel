@extends('layouts.plantillaHome')

@section('title', 'Roles')

@section('content')

    <div class="container py-5">
        <div class="d-flex mb-0 justify-content-end py-5">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary shadow rounded" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop" data-mdb-ripple-init>
                Nuevo rol
            </button>

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog text-center">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <h1 class="modal-title fw-bold text-uppercase" id="staticBackdropLabel">Nuevo rol</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="createForm" action="{{ route('roles.store') }}" method="POST"
                                class="row g-3 needs-validation" novalidate>
                                @csrf
                                <div class="mb-md-4 mt-md-3 pb-3">

                                    <p class="text-dark mb-3">Por favor rellene todos los campos correctamente.</p>

                                    <div data-mdb-input-init class="form-outline form-white mb-2">
                                        <input name="name" type="text" id="name"
                                            class="form-control form-control-lg shadow-lg" required
                                            value="{{ old('name') }}" />
                                        <label class="form-label" for="name">Nombre de rol</label>
                                        <div class="invalid-feedback">
                                            Por favor ingrese un nombre valido
                                        </div>
                                    </div>

                                    <button class="btn btn-outline-primary btn-lg px-5 shadow-lg" type="submit">Añadir
                                        nuevo Rol</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="container  py-5 table-responsive">

            <table id="rolesTableContainer" class="table caption-top">
                <caption class="h2">Lista de roles</caption>
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <div class="d-flex">
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger me-1 shadow"
                                            onclick="return confirm('¿Está seguro de que desea eliminar este rol?')"
                                            data-mdb-ripple-init>Eliminar</button>

                                    </form>
                                    <!-- modal para la edicion de un rol -->
                                    <button type="button" class="btn btn-warning shadow rounded" data-bs-toggle="modal"
                                        data-bs-target="#editRoleModal{{ $role->id }}" data-mdb-ripple-init>
                                        Editar
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="editRoleModal{{ $role->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="editRoleModal{{ $role->id }}" aria-hidden="true">
                                        <div class="modal-dialog text-center">
                                            <div class="modal-content text-center">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fw-bold text-uppercase"
                                                        id="editRoleModal{{ $role->id }}">
                                                        Nuevo rol</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('roles.update', $role->id) }}"
                                                        method="POST" class="editForm row g-3" novalidate>
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-md-4 mt-md-3 pb-3">

                                                            <p class="text-dark mb-3">Por favor rellene todos los campos
                                                                correctamente.</p>

                                                            <div data-mdb-input-init class="form-outline form-white mb-2">
                                                                <input name="name" type="text" id="name"
                                                                    class="form-control form-control-lg shadow-lg"
                                                                    value="{{ $role->name }}" required/>
                                                                <label class="form-label" for="name">Nombre de
                                                                    rol</label>

                                                                <div class="invalid-feedback">
                                                                    Por favor ingrese un nombre valido
                                                                </div>
                                                            </div>

                                                            <button class="btn btn-outline-success btn-lg px-5 shadow-lg"
                                                                type="submit">Guardar cambios</button>
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
            {{ $roles->links() }}

        </div>

    </div>




@endsection
