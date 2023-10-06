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
        if (!isset($funcionario)) {
            $response['error'] = true;
            $response['msg'] = 'Não encontrado';
            return response()->json($response, 404);
        }

        if (isset($funcionario) && $funcionario->delete()) {
            $response['error'] = false;
            $response['msg'] = 'Deletado com sucesso!';
            return response()->json($response, 200);
        }
    }
}
