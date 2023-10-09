@extends('layout')

@section('title', 'Professores - JL')
<style>
    .col-md-4 {
        margin: 0 auto;
    }

    .to-uppercase {
        text-transform: uppercase;
    }

    .funcionarios-navbar {
        margin-top: 1rem;
        display: flex;
        justify-content: space-between
    }
</style>
@section('content-professores')
    <div class="funcionarios-navbar">
        <h1>Professores</h1>
        <p><a href="{{ route('professores.create') }}" class="btn btn-secondary">Adicionar professor</a></p>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Diciplina</th>
                <th scope="col">Telefone</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($professores as $professor)
                <tr>
                    <th scope="col">{{ $professor->id }}</th>
                    <th scope="col">{{ $professor->nome }}</th>
                    <th scope="col">{{ $professor->diciplina }}</th>
                    <th scope="col">{{ $professor->telefone }}</th>
                    <th scope="col">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editarmodal-{{ $professor->id }}" data-bs-whatever="@mdo">Editar</button>
                        <!--Modal Editar-->
                        <div class="modal fade" id="editarmodal-{{ $professor->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Funcionario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('professores.update', $professor->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="row mb-3">
                                                <div class="col-sm-12">
                                                    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                                                    <input type="text" name="nome" class="form-control to-uppercase"
                                                        id="nome" value="{{ $professor->nome }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-12">
                                                    <label for="diciplina" class="col-sm-2 col-form-label">Diciplina</label>
                                                    <input type="text" name="diciplina" class="form-control to-uppercase"
                                                        id="cargo" value="{{ $professor->diciplina }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-12">
                                                    <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
                                                    <input type="text" name="telefone" class="form-control to-uppercase"
                                                        id="telefone" value="{{ $professor->telefone }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-primary" onclick="this.disabled = true; this.form.submit();">Atualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--FIM MODAL EDITAR-->

                        <!--MODAL APAGAR-->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#apagarmodal-{{ $professor->id }}" data-bs-whatever="@mdo">Apagar</button>
                        <div class="modal fade" id="apagarmodal-{{ $professor->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Você realmente deseja apagar esse funcionario?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('professores.destroy', $professor->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-danger" onclick="this.disabled = true; this.form.submit();">Apagar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
