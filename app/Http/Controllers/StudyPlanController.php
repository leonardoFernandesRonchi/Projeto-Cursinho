<?php

namespace App\Http\Controllers;

use App\Models\StudyPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudyPlanController extends Controller
{
    /**
     * Exibe todos os planos de estudo do usuário logado.
     */
    public function index()
    {
        // Carrega todos os planos de estudo do usuário logado
        $studyPlans = Auth::user()->studyPlans; 
        return view('study_plans.index', compact('studyPlans'));
    }

    /**
     * Exibe o formulário para criar um novo plano de estudo.
     */
    public function create()
    {
        return view('study_plans.create');
    }

    /**
     * Armazena o novo plano de estudo.
     */
    public function store(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'activity' => 'required|string',
        ]);

        // Criação do plano de estudo
        $studyPlan = new StudyPlan();
        $studyPlan->title = $request->title;
        $studyPlan->description = $request->description;
        $studyPlan->date = $request->date; // A data do plano de estudo
        $studyPlan->activity = $request->activity;
        $studyPlan->user_id = Auth::id(); // Relaciona o plano com o usuário logado
        $studyPlan->save();

        return redirect()->route('study_plans.index')->with('success', 'Plano de estudo criado com sucesso!');
    }

    /**
     * Exibe o formulário de edição do plano de estudo.
     */
    public function edit(StudyPlan $studyPlan)
    {
        // Garantir que o usuário só edite seus próprios planos
        if ($studyPlan->user_id !== Auth::id()) {
            return redirect()->route('study_plans.index')->with('error', 'Você não tem permissão para editar este plano.');
        }

        return view('study_plans.edit', compact('studyPlan'));
    }

    /**
     * Atualiza o plano de estudo.
     */
    public function update(Request $request, StudyPlan $studyPlan)
    {
        // Garantir que o usuário só edite seus próprios planos
        if ($studyPlan->user_id !== Auth::id()) {
            return redirect()->route('study_plans.index')->with('error', 'Você não tem permissão para editar este plano.');
        }

        // Validação dos campos
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'activity' => 'required|string',
        ]);

        // Atualiza o plano de estudo
        $studyPlan->title = $request->title;
        $studyPlan->description = $request->description;
        $studyPlan->date = $request->date;
        $studyPlan->activity = $request->activity;
        $studyPlan->save();

        return redirect()->route('study_plans.index')->with('success', 'Plano de estudo atualizado com sucesso!');
    }

    /**
     * Exclui o plano de estudo.
     */
    public function destroy(StudyPlan $studyPlan)
    {
        // Garantir que o usuário só exclua seus próprios planos
        if ($studyPlan->user_id !== Auth::id()) {
            return redirect()->route('study_plans.index')->with('error', 'Você não tem permissão para excluir este plano.');
        }

        // Exclui o plano de estudo
        $studyPlan->delete();

        return redirect()->route('study_plans.index')->with('success', 'Plano de estudo excluído com sucesso!');
    }
}
