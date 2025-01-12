<?php

namespace App\Http\Controllers;

use App\Models\StudyPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudyPlanController extends Controller
{
   
    public function index()
    {
        $studyPlans = Auth::user()->studyPlans; 
        return view('study_plans.index', compact('studyPlans'));
    }

  
    public function create()
    {
        return view('study_plans.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'activity' => 'required|string',
        ]);

        $studyPlan = new StudyPlan();
        $studyPlan->title = $request->title;
        $studyPlan->description = $request->description;
        $studyPlan->date = $request->date; 
        $studyPlan->activity = $request->activity;
        $studyPlan->user_id = Auth::id(); 
        $studyPlan->save();

        return redirect()->route('study_plans.index')->with('success', 'Plano de estudo criado com sucesso!');
    }


    public function edit(StudyPlan $studyPlan)
    {
        if ($studyPlan->user_id !== Auth::id()) {
            return redirect()->route('study_plans.index')->with('error', 'Você não tem permissão para editar este plano.');
        }

        return view('study_plans.edit', compact('studyPlan'));
    }

  
    public function update(Request $request, StudyPlan $studyPlan)
    {
        if ($studyPlan->user_id !== Auth::id()) {
            return redirect()->route('study_plans.index')->with('error', 'Você não tem permissão para editar este plano.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'activity' => 'required|string',
        ]);

        $studyPlan->title = $request->title;
        $studyPlan->description = $request->description;
        $studyPlan->date = $request->date;
        $studyPlan->activity = $request->activity;
        $studyPlan->save();

        return redirect()->route('study_plans.index')->with('success', 'Plano de estudo atualizado com sucesso!');
    }

    public function destroy(StudyPlan $studyPlan)
    {
        if ($studyPlan->user_id !== Auth::id()) {
            return redirect()->route('study_plans.index')->with('error', 'Você não tem permissão para excluir este plano.');
        }

        $studyPlan->delete();

        return redirect()->route('study_plans.index')->with('success', 'Plano de estudo excluído com sucesso!');
    }
}
