@extends('layouts.plantillaHome')
@section('title', 'home')

<div class="container  py-5 px-5 mt-5">

    <div class="row row-cols-1 row-cols-md-2 g-5">
        <div class="col">
            <a class="text-decoration-none" href="{{ route('usuarios.index') }}">
                <div class="card bg-dark border-primary border border-5 text-light ">
                    <img class="card-img-top mx-auto d-block"
                        src="https://cdn.pixabay.com/photo/2018/05/01/15/06/user-3365840_1280.png" style="width: 200px; height: 180px;" alt="">
                    <div class="card-body text-center">
                        <h1 class="h5 card-title mb-2 fs-1">Usuarios</h1>
                    </div>

                </div>
            </a>

        </div>

        <div class="col">
            <a class="text-decoration-none" href="{{ route('roles.index') }}">
                <div class="card bg-secondary border-primary border border-5 text-white shadow-lg ">
                    <img class="card-img-top mx-auto d-block "
                        src="https://cdn.pixabay.com/photo/2016/03/23/22/26/user-1275780_1280.png" style="width: 270px; height: 180px;" alt="">
                    <div class="card-body text-center">
                        <h1 class="h5 card-title mb-2 fs-1">Roles</h1>

                    </div>

                </div>
            </a>

        </div>

        <div class="col">
            <a class="text-decoration-none" href="{{ route('categorias.index') }}">
                <div class="card bg-success border-primary border border-5 text-white shadow-lg">
                    <img class="card-img-top mx-auto d-block "
                        src="https://cdn.pixabay.com/photo/2012/04/16/12/33/hierarchy-35795_1280.png" style="width: 200px; height: 180px;" alt="">
                    <div class="card-body text-center">
                        <h1 class="h5 card-title mb-2 fs-1">Categorias</h1>


                    </div>

                </div>

            </a>

        </div>

        <div class="col">
            <a class="text-decoration-none" href="{{ route('productos.index') }}">
                <div class="card bg-danger border-primary border border-5 text-white shadow-lg">
                    <img class="card-img-top mx-auto d-block"
                        src="https://cdn.pixabay.com/photo/2017/08/08/16/06/cosmetics-2611803_1280.png" style="width: 270px; height: 180px;" alt="">
                    <div class="card-body text-center">
                        <h1 class="h5 card-title mb-2 fs-1">Productos</h1>

                    </div>

                </div>

            </a>

        </div>
    </div>
</div>

@section('content')
