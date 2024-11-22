<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('usuarios');
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create(Request $request)
    {
        //recupero los roles para mostrarlos en el formulario de nuevo registro
        $roles = Role::all();
        return view('usuario', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4',
            'email' => 'required|string|email|',
            'role_id' => 'required|exists:roles,id',
            'password' => 'required|string|min:4|confirmed',

        ]);



        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($request['password']);


        $user->save();

        return redirect()->route('usuarios.index')->with('success', '¡Usuario registrado correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $roles = Role::all();

        $users = User::paginate(5);
        return view('usuarios', compact('users'))->with('roles', $roles);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('usuarios.index', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|min:4',
            'email' => 'required|string|email|',
            'role' => 'required|exists:roles,id',
            'password' => 'nullable|string|min:4|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()
        ->with('success', 'Usuario actualizado');
        //return redirect()->route('usuarios.index')->with('success', '!Informacion de usuario actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()
        ->with('success', 'Usuario eliminado');
        //return redirect()->route('usuarios.index')->with('success', '¡Usuario eliminado correctamente!');
    }
}
