<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    //recupera los roles para rellenar el formulario
    public function showRegisterForm()
    {

        $roles = Role::all();

        return view('register', ['roles' => $roles]);
    }

    public function register(Request $request)
    {
       $request->validate([
            'name' => 'required|string|min:4',
            'email' => 'required|string|email|',
            'role' => 'required|exists:roles,id',
            'password' => 'required|string|min:4|confirmed',

        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->password = Hash::make($request['password']);


        $user->save();

        return redirect()->route('login')->with('success', '¡Usuario registrado correctamente!');
    }

    public function iniciasesion(Request $request){

        $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:4',
        ]);


        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }else{
            return redirect(route('login'))->withErrors([
                'email' => 'Correo electronico invalido',
                'password' => 'Contraseña invalida.'
            ]);;
        }

    }

    public function cerrarSesion(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

}
