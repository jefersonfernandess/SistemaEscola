<?php

namespace App\Http\Controllers;

use App\Models\Professores;
use Illuminate\Http\Request;

class ProfessoresController extends Controller
{
    public function index() {
        $professores = Professores::get();
        return view('professores.index', compact('professores'));
    }

    public function create() {
        return view('professores.create');
    }

    public function store(Request $request) {
        Professores::create($request->all());
        return redirect()->route('professores.index')->with('sucess', 'Professor cadastrado com sucesso');
    }

    public function update(Request $request, $id) {
        $professor = professores::find($id);
        if(!$professor) {
            return redirect()->route('professores.index')->with('error', 'Não foi possível atualizar');
        }
        $professor->update($request->all());
        return redirect()->route('professores.index')->with('sucess', 'Atualizado com sucesso!');
    }

    public function destroy($id) {
        $professor = Professores::find($id);

        if (!$professor) {
            return redirect()->route('professores.index')->with('error', 'Funcionário não encontrado');
        }
    
        $professor->delete();
    
        return redirect()->route('professores.index')->with('success', 'Funcionário apagado com sucesso');

    }
}
