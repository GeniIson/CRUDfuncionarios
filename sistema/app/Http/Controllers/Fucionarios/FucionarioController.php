<?php

namespace App\Http\Controllers\Fucionarios;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;


use App\Models\Funcionario;

class FucionarioController extends Controller
{

    public function lista()
    {



        $funcionarios = Funcionario::all();

        return view('Funcionarios/funcionarios', compact('funcionarios'));
    }

    public function destroy($id)
    {

        $funcionario = Funcionario::findOrFail($id); // Busca o funcionário pelo ID
        $funcionario->delete();
        return redirect()->route('Funcionarios')->with('success', 'Cadastro de funcionário DELETADO com sucesso!');
    }

    public function create()
    {
        return view('Funcionarios.cadastro');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|min:14|max:14|unique:funcionarios,cpf',
            'data_nascimento' => 'required|date|before_or_equal:today',
            'telefone' => 'required|string|min:15|max:15',
            'genero' => 'required|in:Masculino,Feminino,Outro',
        ], [

            'data_nascimento.required' => 'A data de nascimento é obrigatória.',
            'data_nascimento.before_or_equal' => 'A data de nascimento deve ser hoje ou uma data anterior.',
            'cpf.min' => 'O CPF possui 11 Digitos.',
            'telefone' => 'O telefone possui 9 Digitos.',
        ]);
        Funcionario::create($request->all());



        return redirect()->route('Funcionarios')->with('success', 'Funcionário cadastrado com sucesso!');
    }



    public function edit($id)
    {
        $funcionario = Funcionario::findOrFail($id); // Busca o funcionário pelo ID
        return view('Funcionarios.cadastro', compact('funcionario')); // Reutiliza a página de cadastro
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|min:14|max:14|unique:funcionarios,cpf,' . $id,
            'data_nascimento' => 'required|date|before_or_equal:today',
            'telefone' => 'required|string|min:15|max:15',
            'genero' => 'required|in:Masculino,Feminino,Outro',
        ], [

            'data_nascimento.required' => 'A data de nascimento é obrigatória.',
            'data_nascimento.before_or_equal' => 'A data de nascimento deve ser hoje ou uma data anterior.',
            'cpf.min' => 'O CPF possui 11 Digitos.',
            'telefone' => 'O telefone possui 9 Digitos.',
        ]);

        $funcionario = Funcionario::findOrFail($id);
        $funcionario->update($request->all());

        return redirect()->route('Funcionarios')->with('success', 'Cadastro de funcionário atualizado com sucesso!');
    }
}
