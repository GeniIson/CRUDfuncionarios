<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|size:11|unique:funcionarios,cpf',
            'data_nascimento' => 'required|date',
            'telefone' => 'nullable|string|max:15',
            'genero' => 'nullable|in:Masculino,Feminino,Outro',
        ]);

        // Criação do registro no banco
        Funcionario::create($validatedData);

        // Redirecionamento ou resposta
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário cadastrado com sucesso!');
    }
}
