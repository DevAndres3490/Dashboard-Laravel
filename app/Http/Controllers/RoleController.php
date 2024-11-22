<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(5);
        return view('roles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

         return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles|max:30'
        ]);

        Role::create($request->all());

        return redirect()->route('roles.index')
        ->with('success', 'Nuevo Rol añadido');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $roles = Role::paginate(5);
        return view('roles.show', compact('roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role :: findOrFail($id);

        $request->validate([
            'name' => 'required|string|unique:roles|max:30'
        ]);


        $role->name = $request->name;

        $role->save();

        return redirect()->back()
        ->with('success', 'Rol actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->back()
        ->with('success', 'Rol Eliminado');

    }
}
