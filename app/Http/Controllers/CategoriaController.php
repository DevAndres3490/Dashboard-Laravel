<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::paginate(5);
        return view('categorias', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles|max:30'
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.index')
        ->with('success', 'Nueva categoría añadida');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categorias = Categoria::paginate(5);
        return view('categorias.show', compact('categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorias = Categoria::findOrFail($id);


        return view('categorias.edit', compact('categorias'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categorias = Categoria::findOrFail($id);
        $request->validate([
            'name' => 'required|string|unique:categoria|max:30'
        ]);

        $categorias->name = $request->name;

        $categorias->save();

        return redirect()->back()
        ->with('success', 'Categoría actualizada');
        //return redirect()->route('categorias.index')->with('success','categoría actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorias = Categoria::findOrFail($id);
        $categorias->delete();

        return redirect()->back()->with('success', 'Categoría eliminada');
        //return redirect()->route('categorias.index')->with('success', 'Categoria eliminada');
    }
}
