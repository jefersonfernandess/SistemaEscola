@extends('layout')

@section('title', 'Criar - JL')

<style>
    .col-md-4 {
        margin: 0 auto;
    }

    input {
        text-transform:uppercase;
    }
</style>
@section('content')



<h1 class="text-center mt-2">Cadastrar funcionario</h1>

    <div class="col-md-4 text-center">

        <form action="{{ route('funcionarios.store') }}" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="cargo" class="col-sm-2 col-form-label">Cargo</label>
                    <input type="text" name="cargo" class="form-control" id="cargo">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control" id="telefone">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="descricao" class="col-sm-2 col-form-label">Descrição</label>
                    <input type="text" name="descricao" class="form-control" id="descricao">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="nivel" class="col-sm-2 col-form-label">Nivel</label>
                    <input type="text" name="nivel" class="form-control" id="nivel">
                </div>
            </div>
            <div class="row mb-3">
                <button type="submit" id="botaoenviar" class="btn btn-primary" onclick="this.disabled = true; this.form.submit();">Cadastrar funcionario</button>
            </div>
        </form>
    </div>

@endsection
