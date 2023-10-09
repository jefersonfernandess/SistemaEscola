@extends('layout')

@section('title', 'Adicionar professor - JL')

<style>
    .col-md-4 {
        margin: 0 auto;
    }

    input {
        text-transform:uppercase;
    }
</style>
@section('content')

<h1 class="text-center mt-2">Cadastrar professor</h1>

    <div class="col-md-4 text-center">

        <form action="{{ route('professores.store')}}" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="cargo" class="col-sm-2 col-form-label">Diciplina</label>
                    <input type="text" name="diciplina" class="form-control" id="diciplina">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control" id="telefone">
                </div>
            </div>
            <div class="row mb-3">
                <button type="submit" id="botaoenviar" class="btn btn-primary" onclick="this.disabled = true; this.form.submit();">Cadastrar professor(a)</button>
            </div>
        </form>
    </div>

@endsection
