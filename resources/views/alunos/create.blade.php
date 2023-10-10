@extends('layout')

@section('title', 'Criar - JL')

<style>
    .col-md-4 {
        margin: 0 auto;
    }

    input {
        text-transform: uppercase;
    }
</style>
@section('content')
    <h1 class="text-center mt-2">Cadastrar Aluno</h1>

    <div class="col-md-4 text-center">

        <form action="{{ route('alunos.store') }}" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="cargo" class="col-sm-2 col-form-label">Endereço</label>
                    <input type="text" name="endereco" class="form-control" id="endereco">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="telefone" class="col-sm-2 col-form-label">Data de nascimento</label>
                    <input type="date" name="nascimento" class="form-control" id="nascimento">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="nomeResponsavel" class="col-sm-2 col-form-label">Nome responsavel</label>
                    <input type="text" name="nomeResponsavel" class="form-control" id="nomeResponsavel">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="telefoneUm" class="col-sm-2 col-form-label">Telefone 1</label>
                    <input type="text" name="telefoneUm" class="form-control" id="telefoneUm">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="telefoneDois" class="col-sm-2 col-form-label">Telefone 2</label>
                    <input type="text" name="telefoneDois" class="form-control" id="telefoneDois">
                </div>
            </div>
            <div class="row mb-3">
                <button type="submit" id="botaoenviar" class="btn btn-primary"
                    onclick="this.disabled = true; this.form.submit();">Cadastrar funcionario</button>
            </div>
        </form>
    </div>

@endsection
