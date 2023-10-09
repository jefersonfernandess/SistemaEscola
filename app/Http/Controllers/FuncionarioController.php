<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index() {
        $funcionarios = Funcionario::get();
        return view('funcionarios.index', compact('funcionarios'));
    }

    public function create() {
        return view('funcionarios.create');
    }

    public function store(Request $request) {
        Funcionario::create($request->all());
        return redirect()->route('funcionarios.index')->with('msg', 'Funcionario cadastrado com sucesso');
    }

    public function edit($id) {
        dd($id);
        $funcionario = Funcionario::find($id);
        if($funcionario) {
            return view('funcionarios.edit', compact('funcionario'));
        }
        return redirect()->route('funcionarios.index')->with('msg', 'Funcionario não encontrado!');
    }

    public function update(Request $request, $id) {
        $funcionario = Funcionario::find($id);
        if(!$funcionario) {
            return redirect()->route('funcionarios.index')->with('msg', 'Não foi possível atualizar');
        }
        $funcionario->update($request->all());
        return redirect()->route('funcionarios.index')->with('msg', 'Atualizado com sucesso!');
    }

    public function destroy($id) {
        $funcionario = Funcionario::find($id);

        if (!$funcionario) {
            return redirect()->route('funcionarios.index')->with('error', 'Funcionário não encontrado');
        }
    
        $funcionario->delete();
    
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário apagado com sucesso');

    }
}
