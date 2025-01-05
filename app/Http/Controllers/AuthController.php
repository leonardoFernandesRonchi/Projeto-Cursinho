<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Exibe a página de login e registro.
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Processa o login do usuário.
     */
    public function loginSubmit(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'O username é obrigatório.',
            'password.required' => 'A senha é obrigatória.',
        ]);

        // Tentativa de login usando o Auth facade
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Regenera a sessão para segurança
            $request->session()->regenerate();
            $request->session()->put('user', 'user');
            // Redireciona para a página inicial ou para o destino pretendido
            return redirect()->route('home');
        }

        // Se o login falhar, retorna com erro
        return back()->withErrors([
            'loginError' => 'Login ou senha inválidos.',
        ])->withInput();
    }

    /**
     * Processa o registro de um novo usuário.
     */
    public function registerSubmit(Request $request)
    {
        // Validação dos campos de registro
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

        // Criação do usuário
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password), // Hash da senha
        ]);

        // Login automático após registro
        Auth::login($user);
        $request->session()->put('user', 'user');


        return redirect()->to('/')->with('success', 'Registro realizado com sucesso!');
    }

    /**
     * Processa o logout do usuário.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalida a sessão e regenera o token de segurança
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Você saiu da sua conta.');
    }
}
