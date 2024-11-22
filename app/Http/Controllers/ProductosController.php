<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('productos');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
         //recupero las categorias para mastrarlos en el formulario de nuevo registro
        $categorias = Categoria::all();
        return view('productos.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4',
            'categoria_id' => 'required|exists:categoria,id'
        ]);

        $producto = new Producto();
        $producto->name = $request->name;
        $producto->categoria_id = $request->categoria_id;

        $producto->save();

        return redirect()->route('productos.index')->with('success','Producto registrado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $categorias = Categoria::all();

        $productos = Producto::paginate(5);

        return view('productos', compact('productos'))->with('categorias', $categorias);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();

        return view('productos.index', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'name' => 'required|string|min:4',
            'categoria_id' => 'required|exists:categoria,id'
        ]);

        $producto->name = $request->name;
        $producto->categoria_id = $request->categoria_id;

        $producto->save();

        return redirect()->back()
        ->with('success', 'Usuario actualizado');
        //return redirect() ->route('productos.index')->with('success', 'Informacion de producto actualiza correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->back()
        ->with('success', 'Producto eliminado');
        //return redirect()->route('productos.index')->with('success','¡Producto eliminado correctamente!');
    }
}
