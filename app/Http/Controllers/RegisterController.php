<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){


        return view('auth.register');
    }


    public function store(Request $request)
    {


        //modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);

        //dd($request);
        $this->validate($request, [

            'name' => 'required',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|max:30',
            'password' => 'required|confirmed|min:6'
            /* 'password_confirmation' => 'required', */

        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //autenticar un usuario
        auth()->attempt([
            'email'=> $request->email,
            'password' => $request->password
        ]);
        //otra forma
      /*   auth()->attempt($request->only('email','password')); */

        //redireccionar
       return redirect()->route('posts.index');


    }


}
