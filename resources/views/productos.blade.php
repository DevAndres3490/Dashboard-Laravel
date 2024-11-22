@extends('layouts.plantillaHome')
@section('title', 'productos')
@section('content')

    <div class="container py-5 table-responsive">

        <!-- modal para la creaacion de un producto -->
        <div class="d-flex mb-0 justify-content-end py-5">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary shadow rounded" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop" data-mdb-ripple-init>
                Nuevo Producto
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog text-center">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <h1 class="modal-title fw-bold text-uppercase" id="staticBackdropLabel">Registro</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="createForm" action="{{ route('productos.store') }}" method="POST" class="row g-3 needs-validation"
                                novalidate>
                                @csrf
                                <div class="mb-md-4 mt-md-3 pb-3">

                                    <p class="text-dark mb-3">Por favor rellene todos los campos correctamente.</p>

                                    <div data-mdb-input-init class="form-outline form-white mb-2">
                                        <input name="name" type="text" id="name"
                                            class="form-control form-control-lg shadow" value="{{ old('name') }}"
                                            required />
                                        <label class="form-label" for="name">Nombre del producto</label>
                                        <br>
                                        @error('name')
                                            <span class="text-danger">*{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <select name="categoria_id" class="form-select form-select-lg  shadow"
                                            aria-label="Default select example" required>
                                            <option selected value="">Elija una categoría: </option>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Por favor seleccione un categoria.
                                        </div>
                                    </div>



                                    <button class="btn btn-outline-primary btn-lg px-5 shadow-lg" type="submit">Registrar
                                        producto</button>
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


        <table class="table caption-top">
            <caption class="h2">Lista de productos</caption>
            <thead>
                <tr class="table-primary">
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Ctegoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->name }}</td>
                        <td>{{ $producto->categoria->name }}</td>
                        <td>
                            <div class="d-flex">
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger me-1 shadow"
                                        onclick="return confirm('¿Está seguro de que desea eliminar este producto?')"
                                        data-mdb-ripple-init>Eliminar</button>

                                </form>
                                <!-- modal para la edicion de un producto -->
                                <button type="button" class="btn btn-warning shadow rounded" data-bs-toggle="modal"
                                    data-bs-target="#editRoleModal{{ $producto->id }}" data-mdb-ripple-init>
                                    Editar
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="editRoleModal{{ $producto->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="editRoleModal{{ $producto->id }}" aria-hidden="true">
                                    <div class="modal-dialog text-center">
                                        <div class="modal-content text-center">
                                            <div class="modal-header">
                                                <h1 class="modal-title fw-bold text-uppercase"
                                                    id="editRoleModal{{ $producto->id }}">
                                                    Nuevo rol</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('productos.update', $producto->id) }}"
                                                    method="POST" class="row g-3 needs-validation" novalidate>
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-md-4 mt-md-3 pb-3">

                                                        <p class="text-dark mb-3">Por favor rellene todos los campos
                                                            correctamente.</p>

                                                        <div data-mdb-input-init class="form-outline form-white mb-2">
                                                            <input name="name" type="text" id="name"
                                                                class="form-control form-control-lg shadow-lg"
                                                                value="{{ $producto->name }}" required/>
                                                            <label class="form-label" for="name">Nombre del
                                                                producto</label>
                                                            <br>
                                                            <div class="invalid-feedback">
                                                                Por favor escriba un nombre valido.
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <select name="categoria_id"
                                                                class="form-select form-select-lg  shadow-lg"
                                                                required>
                                                                <option selected value="">Elija una categoria: </option>
                                                                @foreach ($categorias as $categoria)
                                                                    <option value="{{ $categoria->id }}"
                                                                        {{ $categoria->id == $producto->categoria_id ? 'selected' : '' }}>
                                                                        {{ $categoria->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Por favor seleccione una categoría.
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
        {{ $productos->links() }}

    </div>


@endsection
