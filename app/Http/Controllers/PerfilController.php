<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener el usuario autenticado
        $usuario = Auth::user();
        $roles = Role::all();
        return view('perfil', compact('usuario'))->with('roles', $roles);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = Auth::user();
        $roles = Role::all();
        return view('perfil.editar', compact('usuario','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = User::findOrFail($id);


        if (!$usuario) {
            // Si el usuario no se encuentra, redirige con un mensaje de error
            return redirect()->back()->with('error', 'El usuario no se encontró');
        }

        $request->validate([
            'name' => 'required|string|min:4',
            'email' => 'required|string|email|',
            'role' => 'required|exists:roles,id',
        ]);


        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->role_id = $request->role;

        $usuario->save();


        return redirect()->route('perfil.index')->with('success', '¡Perfil actualizado correctamente!');

    }

}
