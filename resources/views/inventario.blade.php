@extends('layouts.plantillaHome')
@section('title', 'inventario')
@section('content')

    <div class="container py-5 px-5 mt-5">

        <div class="container">

            <div class="row row-cols-1 row-cols-md-2 g-4">


                <div class="col">
                    <a class="text-decoration-none" href="{{ route('categorias.index') }}">
                        <div class="card">
                            <img src='assets/images/categorias.png' class="rounded shadow-lg" alt="categorias">
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a class="text-decoration-none" href="{{ route('productos.index') }}">
                        <div class="card">
                            <img src='assets/images/productos.png' class="rounded shadow-lg" alt="productos">
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>

@endsection
