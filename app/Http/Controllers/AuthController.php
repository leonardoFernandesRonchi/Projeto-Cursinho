<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        // Exibe a página de login/registro
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        // Validação do formulário
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required|min:6|max:16'
            ],
            [
                'username.required' => 'O username é obrigatório',
                'password.required' => 'A senha é obrigatória',
                'password.min' => 'A senha deve ter pelo menos :min caracteres',
                'password.max' => 'A senha deve ter no máximo :max caracteres'
            ]
        );

        // Busca o usuário pelo username
        $user = User::where('username', $request->username)->first();

        // Verifica se o usuário existe e a senha está correta
        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('loginError', 'Username ou senha incorretos.');
        }

        // Login bem-sucedido
        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username
            ]
        ]);

        return redirect()->to('/');
    }

    public function registerSubmit(Request $request)
    {
        // Validação do formulário
        $request->validate(
            [
                'username' => 'required|unique:users,username',
                'password' => 'required|min:6|max:16'
            ],
            [
                'username.required' => 'O username é obrigatório',
                'username.unique' => 'Este username já está registrado',
                'password.required' => 'A senha é obrigatória',
                'password.min' => 'A senha deve ter pelo menos :min caracteres',
                'password.max' => 'A senha deve ter no máximo :max caracteres'
            ]
        );

        // Criação do usuário
        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password) // Criptografa a senha
        ]);

        return redirect()->to('/login')->with('success', 'Registro realizado com sucesso. Faça login.');
    }

    public function logout()
    {
        // Logout do usuário
        session()->forget('user');
        return redirect()->to('/login');
    }
}