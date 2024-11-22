@extends('layouts.plantillaUser')
@section('title', 'register')
@section('content')
<section class="vh-100 vh-100 bg-primary bg-opacity-75">
        <div class="container py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-white text-secondary shadow-lg" style="border-radius: 1rem;">
                  <div class="card-body p-5 text-center">

                    <form action="{{ route('register.create') }}" method="POST">
                        @csrf
                    <div class="mb-md-4 mt-md-3 pb-3">

                      <h2 class="fw-bold mb-2 text-uppercase">Registro</h2>
                      <p class="text-dark mb-3">Por favor rellene todos los campos correctamente.</p>

                      <div data-mdb-input-init class="form-outline form-white mb-2">
                          <input name="name" type="text" id="name" class="form-control form-control-lg shadow-lg" value="{{ old('name') }}"/>
                          <label class="form-label" for="name">Nombre</label>
                          <br>
                          @error('name')
                          <span class="text-danger">*{{ $message }}</span>
                          @enderror
                      </div>


                      <div data-mdb-input-init class="form-outline form-white mb-2">
                        <input name="email" type="email" id="email" class="form-control form-control-lg shadow-lg" value="{{ old('email') }}" />
                        <label class="form-label" for="email">Email</label>
                        <br>
                      @error('email')
                      <br>
                      <span class="text-danger">*{{ $message }}</span>
                      <br>
                      @enderror
                      </div>



                      <div class="mb-3">
                          <select name="role" class="form-select form-select-lg  shadow-lg" aria-label="Default select example">
                              <option selected>Elija un rol: </option>
                              @foreach ($roles as $role)
                                  <option value="{{ $role->id }}">{{ $role->name }}</option>
                              @endforeach
                          </select>
                      <br>
                      @error('role')
                      <br>
                      <span class="text-danger">*{{ $message }}</span>
                      <br>
                      @enderror
                      </div>

                      <div data-mdb-input-init class="form-outline form-white mb-2">
                        <input name="password" type="password" id="password" class="form-control form-control-lg shadow-lg" />
                        <label class="form-label" for="password">Contraseña</label>
                        <br>
                      @error('password')
                      <br>
                      <span class="text-danger">*{{ $message }}</span>
                      <br>
                      @enderror
                      </div>


                      <div data-mdb-input-init class="form-outline form-white mb-2">
                          <input name="password_confirmation" type="password" id="password_confirmation" class="form-control form-control-lg shadow-lg" />
                          <label class="form-label" for="password_confirmation">Confirmar contraseña</label>
                          <br>
                      @error('password_confirmation')
                      <br>
                      <span class="text-danger">*{{ $message }}</span>
                      <br>
                      @enderror
                      </div>

                      <button  class="btn btn-outline-primary btn-lg px-5 shadow-lg" type="submit">Registrarse</button>
                    </div>
                    <div>
                        <p class="mb-0">Tiene una cuenta? <a href="{{ route('login') }}" class="link-primary fw-bold ">Volver a login</a>
                        </p>
                      </div>
                </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
  </section>
@endsection()
