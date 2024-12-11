@extends('layouts.plantillaUser')
@section('title', 'login')

@section('content')
<section class="vh-100 bg-primary bg-opacity-75">
    <div class="container py-3 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-white text-secondary shadow-lg" style="border-radius: 1rem;">


            <div class="card-body p-5 text-center ">

                <form action="{{ route('login.iniciasesion') }}" method="POST">
                    @csrf


                    <div class="mb-md-5 mt-md-4 pb-5">

                        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                        <p class="text-dark mb-5">Por favor escriba su email y contraseña</p>

                        <div data-mdb-input-init class="form-outline form-white mb-3">
                          <input type="email" id="email" name="email" class="form-control form-control-lg shadow-lg" />
                          <label class="form-label" for="email">Email</label>
                          <br>
                          @error('email')
                          <span class="text-danger">*{{ $message }}</span>
                          @enderror
                        </div>

                        <div data-mdb-input-init class="form-outline form-white mb-3">
                          <input type="password" id="password" name="password" class="form-control form-control-lg shadow-lg" />
                          <label class="form-label" for="password">Contraseña</label>
                          <br>
                          @error('password')
                          <span class="text-danger">*{{ $message }}</span>
                          @enderror
                        </div>

                        <p class="small mb-5 pb-lg-2"><a class="text-dark" href="#!">Olvido la contraseña?</a></p>

                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-success btn-lg px-5 shadow-lg" type="submit">Login</button>

                      </div>

                </form>

                <div>
                    <p class="mb-0">No tiene una cuenta? <a href="{{ route('register') }}" class="link-primary fw-bold ">Registrarse</a>
                    </p>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection()
