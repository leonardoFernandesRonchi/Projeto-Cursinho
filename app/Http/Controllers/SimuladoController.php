<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SimuladoController extends Controller
{
    public function getExam(Request $request)
    {
        $category = $request->input('category', '9'); // Categoria padrão: '9' (General Knowledge)
        $difficulty = $request->input('difficulty', 'easy'); // Dificuldade padrão: 'easy'

        try {
            $client = new Client();
            $response = $client->get("https://opentdb.com/api.php", [
                'query' => [
                    'amount' => 10, // Quantidade de questões
                    'category' => $category, // Categoria de questões
                    'difficulty' => $difficulty, // Nível de dificuldade
                    'type' => 'multiple', // Tipo de questões (múltipla escolha)
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            // Verifica se a API retornou questões
            if (isset($data['results']) && count($data['results']) > 0) {
                $questions = $data['results'];

                return view('gerado', ['questions' => $questions]);
            } else {
                return back()->withErrors(['error' => 'Nenhum dado encontrado.']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Erro ao buscar os dados do exame: ' . $e->getMessage()]);
        }
    }
}
