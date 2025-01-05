<?php

namespace App\Http\Controllers;

use App\Models\Anotacoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnotacoesController extends Controller
{
    public function inicio()
    {
        $anotacoes = Auth::user()->anotacoes;
        
        return view('anotacoes/inicio', compact('anotacoes'));
    }
    public function information(Anotacoes $anotacoes)
{
    if ($anotacoes->user_id !== Auth::id()) {
        return redirect()->route('login')->with('error', 'Você não tem permissão para visualizar esta anotação.');
    }

    return view('anotacoes/informacao', compact('anotacoes'));
}

    public function saveNote(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'activity' => 'required|string|max:2000',
        ]);

        Anotacoes::create([
            'title' => $request->title,
            'activity' => $request->activity,
            'user_id' => Auth::id(),
            'date' => now(),
        ]);

        return redirect()->route('getAnotacoes')->with('success', 'Anotação salva com sucesso!');
    }

    public function editNote(Anotacoes $anotacoes)
    {
        if ($anotacoes->user_id !== Auth::id()) {
            return redirect()->route('login')->with('error', 'Você não tem permissão para editar esta anotação.');
        }

        return view('anotacoes/edit', compact('anotacoes'));
    }

    public function updateNote(Request $request, Anotacoes $anotacoes)
    {
        if ($anotacoes->user_id !== Auth::id()) {
            return redirect()->route('login')->with('error', 'Você não tem permissão para editar esta anotação.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'activity' => 'required|string|max:2000',
        ]);

        $anotacoes->update([
            'title' => $request->title,
            'activity' => $request->activity,
        ]);

        return redirect()->route('getAnotacoes')->with('success', 'Anotação atualizada com sucesso!');
    }

    public function destroy(Anotacoes $anotacoes)
    {
        if ($anotacoes->user_id !== Auth::id()) {
            return redirect()->route('login')->with('error', 'Você não tem permissão para excluir esta anotação.');
        }

        $anotacoes->delete();

        return redirect()->route('getAnotacoes')->with('success', 'Anotação apagada com sucesso!');
    }
}
