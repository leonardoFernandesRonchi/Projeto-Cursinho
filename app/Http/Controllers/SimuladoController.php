<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SimuladoController extends Controller
{
    public function getExam(Request $request)
    {
        $category = $request->input('category', '9'); 
        $difficulty = $request->input('difficulty', 'easy'); 
    
        try {
            $client = new Client();
            $response = $client->get("https://opentdb.com/api.php", [
                'query' => [
                    'amount' => 10, 
                    'category' => $category, 
                    'difficulty' => $difficulty, 
                    'type' => 'multiple', 
                ]
            ]);
    
            $data = json_decode($response->getBody(), true);
    
            if (isset($data['results']) && count($data['results']) > 0) {
                $questions = $data['results'];
                session(['questions' => $questions]);  
    
                return view('gerado', ['questions' => $questions]);
            } else {
                return back()->withErrors(['error' => 'Nenhum dado encontrado.']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Erro ao buscar os dados do exame: ' . $e->getMessage()]);
        }
    }
    public function export()
{
    if (!session()->has('questions')) {
        return redirect()->route('exercicios');
    }

    $exercises = session()->get('questions');
    $filename = 'prova_' . env('APP_NAME') . '_' . date('YmdHis') . '.txt';

    $content = "Prova de " . env('APP_NAME') . "\n";
    $content .= "--------------------------------------------------\n\n";
    $content .= "Instruções: Responda as questões abaixo, marcando a alternativa correta.\n\n";
    
    $questionNumber = 1; 

    foreach ($exercises as $exercise) {
        $content .= "Questão $questionNumber:\n";
        $content .= $exercise['question'] . "\n\n";

        $options = array_merge([$exercise['correct_answer']], $exercise['incorrect_answers']);
        shuffle($options); 

        $letterOptions = ['A', 'B', 'C', 'D', 'E']; 
        foreach ($options as $index => $option) {
            $content .= "{$letterOptions[$index]}. $option\n";
        }

        $content .= "\n";

        $questionNumber++;
    }

    $content .= "\n--------------------------------------------------\n";
    $content .= "Fim da prova.\n";

    file_put_contents($filename, $content);

    return response($content)
           ->header('Content-Type', 'text/plain')
           ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
}


}
  
