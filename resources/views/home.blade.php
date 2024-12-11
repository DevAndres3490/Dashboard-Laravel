@extends('layouts.plantillaHome')
@section('title', 'home')

<div class="container  py-5 px-5 mt-5">

    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 g-5">
            <div class="col">
                <a class="text-decoration-none" href="{{ route('usuarios.index') }}">
                    <div class="card-home card  rounded-4">
                        <img src='assets/images/usuarios.png' class="rounded-3 shadow-lg" alt="usuarios">
                    </div>
                </a>
            </div>

            <div class="col">
                <a class="text-decoration-none" href="{{ route('roles.index') }}">
                    <div class="card-home card  rounded-4">
                        <img src='assets/images/roles.png' class="rounded-3 shadow-lg" alt="roles">
                    </div>
                </a>
            </div>
            <div class="col">
                <a class="text-decoration-none" href="{{ route('categorias.index') }}">
                    <div class="card-home card  rounded-5">
                        <img src='assets/images/categorias.png' class="rounded-3 shadow-lg" alt="categorias">
                    </div>
                </a>
            </div>
            <div class="col">
                <a class="text-decoration-none" href="{{ route('productos.index') }}">
                    <div class="card-home card rounded-4">
                        <img src='assets/images/productos.png' class="rounded-3 shadow-lg" alt="productos">
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

@section('content')
