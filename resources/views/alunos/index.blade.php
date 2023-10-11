@extends('layout')

@section('title', 'Alunos - JL')

<style>
    .col-md-4 {
        margin: 0 auto;
    }

    .to-uppercase {
        text-transform: uppercase;
    }

    .alunos-navbar {
        margin-top: 1rem;
        display: flex;
        justify-content: space-between
    }
</style>
@section('content-alunos')
    <div class="alunos-navbar">
        <h1>Alunos</h1>
        <p><a href="{{ route('alunos.create') }}" class="btn btn-secondary">Criar aluno</a></p>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Data de nascimento</th>
                <th scope="col">Responsavel</th>
                <th scope="col">Telefone 1</th>
                <th scope="col">Telefone 2</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
                <tr {{ $aluno->id }}>
                    <th scope="row">{{ $aluno->id }}</th>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->nascimento }}</td>
                    <td>{{ $aluno->nomeResponsavel }}</td>
                    <td>{{ $aluno->telefoneUm }}</td>
                    <td>{{ $aluno->telefoneDois }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editarmodal-{{ $aluno->id }}" data-bs-whatever="@mdo">Editar</button>
                        <!--Modal Editar-->
                        <div class="modal fade" id="editarmodal-{{ $aluno->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">aluno</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('alunos.update', $aluno->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="row mb-3">
                                                <div class="col-sm-12">
                                                    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                                                    <input type="text" name="nome" class="form-control to-uppercase"
                                                        id="nome" value="{{ $aluno->nome }}">
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-3">
                                                <div class="col-sm-12">
                                                    <label for="telefone" class="col-sm-2 col-form-label">Data de nascimento</label>
                                                    <input type="date" name="nascimento" class="form-control to-uppercase"
                                                        id="telefone" value="{{ $aluno->nascimento }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-12">
                                                    <label for="nomeResponsavel" class="col-sm-2 col-form-label">Nome responsavel</label>
                                                    <input type="text" name="nomeReponsavel" class="form-control to-uppercase"
                                                        id="nomeResponsavel" value="{{ $aluno->nomeResponsavel }}">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-12">
                                                    <label for="telefoneUm" class="col-sm-2 col-form-label">Telefone 1</label>
                                                    <input type="text" name="telefoneUm" class="form-control to-uppercase"
                                                        id="telefoneUm" value="{{ $aluno->telefoneUm }}">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-12">
                                                    <label for="telefoneDois" class="col-sm-2 col-form-label">Telefone 2</label>
                                                    <input type="text" name="telefoneDois" class="form-control to-uppercase"
                                                        id="telefoneDois" value="{{ $aluno->telefoneDois }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-primary"
                                                    onclick="this.disabled = true; this.form.submit();">Atualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--FIM MODAL EDITAR-->

                        <!--MODAL APAGAR-->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#apagarmodal-{{ $aluno->id }}" data-bs-whatever="@mdo">Apagar</button>
                        <div class="modal fade" id="apagarmodal-{{ $aluno->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Você realmente deseja apagar esse
                                            aluno?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('alunos.destroy', $aluno->id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="this.disabled = true; this.form.submit();">Apagar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
            @endforeach

        </tbody>
    </table>

    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
    <script src="{{ asset('js/apagaralunos.js') }}"></script>

@endsection
