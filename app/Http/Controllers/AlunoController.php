<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index() {

        $alunos = Aluno::get();
        return view('alunos.index', compact('alunos'));
    }

    public function create() {
        return view('alunos.create');
    }

    public function store(Request $request) {
        Aluno::create($request->all());
        return redirect()->route('alunos.index')->with('msg', 'Aluno cadastrado com sucesso');
    }

    public function update(Request $request, $id) {
        $aluno = Aluno::find($id);
        if(!$aluno) {
            return redirect()->route('alunos.index')->with('error', 'Não foi possível atualizar');
        }
        $aluno->update($request->all());
        return redirect()->route('alunos.index')->with('sucess', 'Atualizado com sucesso!');
    }

    public function destroy($id) {
        $aluno = Aluno::find($id);

        if (!$aluno) {
            return redirect()->route('alunos.index')->with('error', 'Funcionário não encontrado');
        }
    
        $aluno->delete();
    
        return redirect()->route('alunos.index')->with('success', 'Funcionário apagado com sucesso');

    }
}
