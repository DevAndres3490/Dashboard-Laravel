@extends('layouts.plantillaHome')
@section('title', 'Perfil')
@section('content')

    <div class="container py-5">

        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 py-5">
                <div class="card bg-white text-secondary shadow-lg" style="border-radius: 1rem;">

                    <div class="card-body p-4">
                        <form action="{{ route('perfil.update', $usuario->id) }}" method="POST">

                            @csrf
                            @method('PUT')

                            <!-- Name input -->
                            <div data-mdb-input-init class="form-outline form-white mb-2">
                                <input name="name" type="text" id="name"
                                    class="form-control form-control-lg shadow fs-5" value="{{ $usuario->name }}" />
                                <label class="form-label fs-6" for="name">Nombre</label>
                                <br>
                                @error('name')
                                    <span class="text-danger">*{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline form-white mb-2">
                                <input name="email" type="email" id="email"
                                    class="form-control form-control-lg shadow fs-5" value="{{ $usuario->email }}" />
                                <label class="form-label fs-6" for="email">Email</label>
                                <br>
                                @error('email')
                                    <br>
                                    <span class="text-danger">*{{ $message }}</span>
                                    <br>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <select name="role" class="form-select form-select-lg  shadow fs-5"
                                    aria-label="Default select example fs-6">
                                    <option selected>Elija un rol: </option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ $role->id == $usuario->role_id ? 'selected' : '' }}>
                                            {{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <br>
                                @error('role')
                                    <br>
                                    <span class="text-danger">*{{ $message }}</span>
                                    <br>
                                @enderror
                            </div>


                            <button class="btn btn-warning shadow-lg" type="submit">Actualizar usuario</button>



                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>



@endsection
