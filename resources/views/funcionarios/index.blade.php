@extends('layout')

@section('title', 'Funcionarios - JL')
<style>
    .col-md-4 {
        margin: 0 auto;
    }

    .to-uppercase {
        text-transform: uppercase;
    }
</style>
@section('content')
    <h1>Funcionarios</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cargo</th>
                <th scope="col">Telefone</th>
                <th scope="col">Descrição</th>
                <th scope="col">Nível</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($funcionarios as $funcionario)
                <tr>
                    <th scope="row">{{ $funcionario->id }}</th>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->cargo }}</td>
                    <td>{{ $funcionario->telefone }}</td>
                    <td>{{ $funcionario->descricao }}</td>
                    <td>{{ $funcionario->nivel }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editarmodal-{{ $funcionario->id }}" data-bs-whatever="@mdo">Editar</button>
                        <!--Modal Editar-->
                        <div class="modal fade" id="editarmodal-{{ $funcionario->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Funcionario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="row mb-3">
                                                <div class="col-sm-12">
                                                    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                                                    <input type="text" name="nome" class="form-control to-uppercase"
                                                        id="nome" value="{{ $funcionario->nome }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-12">
                                                    <label for="cargo" class="col-sm-2 col-form-label">Cargo</label>
                                                    <input type="text" name="cargo" class="form-control to-uppercase"
                                                        id="cargo" value="{{ $funcionario->cargo }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-12">
                                                    <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
                                                    <input type="text" name="telefone" class="form-control to-uppercase"
                                                        id="telefone" value="{{ $funcionario->telefone }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-12">
                                                    <label for="descricao" class="col-sm-2 col-form-label">Descrição</label>
                                                    <input type="text" name="descricao" class="form-control to-uppercase"
                                                        id="descricao" value="{{ $funcionario->descricao }}">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-12">
                                                    <label for="nivel" class="col-sm-2 col-form-label">Nivel</label>
                                                    <input type="text" name="nivel" class="form-control to-uppercase"
                                                        id="nivel" value="{{ $funcionario->nivel }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-primary">Atualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--FIM MODAL EDITAR-->

                        <!--MODAL APAGAR-->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Apagar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Remover funcionario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Você deseja apagar os dados desse funcionário?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Voltar</button>
                                        <button type="button" class="btn btn-danger">Apagar dados</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <p><a href="{{ route('funcionarios.create') }}">Criar funcionario</a></p>


@endsection
