<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  
    public function login()
    {
        return view('login');
    }

  
    public function loginSubmit(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'O username é obrigatório.',
            'password.required' => 'A senha é obrigatória.',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            $request->session()->put('user', 'user');
            return redirect()->route('home');
        }

        return back()->withErrors([
            'loginError' => 'Login ou senha inválidos.',
        ])->withInput();
    }

    public function registerSubmit(Request $request)
    {
        $request->validate([
            'username' => 'required|alpha_num|unique:users,username',
            'password' => 'required|string|min:6|max:16|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/',
        ], [
            'username.required' => 'O username é obrigatório.',
            'username.alpha_num' => 'O username deve conter apenas letras e números.',
            'username.unique' => 'Este username já está registrado.',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres.',
            'password.max' => 'A senha deve ter no máximo 16 caracteres.',
            'password.regex' => 'A senha deve conter pelo menos uma letra maiúscula, uma minúscula e um número.',
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password), 
        ]);

        Auth::login($user);
        $request->session()->put('user', 'user');


        return redirect()->to('/')->with('success', 'Registro realizado com sucesso!');
    }

   
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Você saiu da sua conta.');
    }
}
