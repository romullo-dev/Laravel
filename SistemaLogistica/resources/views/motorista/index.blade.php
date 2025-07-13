@extends('layouts.app')

@section('content')

    @if(session('success'))

        <div class="alert alert-success" role="alert">
            {{ session('success') }}

        </div>
    @endif

    @if(session('error'))

        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="container-fluid py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold"><i class="bi bi-people-fill me-2"></i>Usuários</h3>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalNovoMotorista">
                <i class="bi bi-person-plus-fill me-1"></i> Novo Usuário
            </button>
        </div>

        <!-- Filtros -->
        <form method="GET" class="row g-2 mb-3">
            <div class="col-md-4">
                <input type="text" name="busca" class="form-control" placeholder="Buscar por nome ou CPF">
            </div>
            <div class="col-md-3">
                <select name="tipo" class="form-select">
                    <option value="">Tipo de Usuário</option>
                    <option value="admin">Admin</option>
                    <option value="operador">Operador</option>
                    <option value="motorista">Motorista</option>
                </select>
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">Status</option>
                    <option value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-outline-primary w-100"><i class="bi bi-search"></i> Filtrar</button>
            </div>
        </form>

        <!-- Tabela -->
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle table-bordered bg-white">
                <thead class="table-light">
                    <tr>
                        <th>Data Criação</th>
                        <th>Nome</th>
                        <th>CNH</th>
                        <th>Categoria</th>
                        <th>Validade</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($usuarios as $usuario)
                        @foreach ($usuario->motorista as $dadosMotorista)
                            <td>{{ $dadosMotorista->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $usuario->nome }}</td>
                            <td>{{ $dadosMotorista->cnh }}</td>
                            <td>{{ $dadosMotorista->categoria }}</td>
                            <td>{{ $dadosMotorista->validade_cnh->format('d/m/Y')  }}</td>
                            
                                <td class="text-center">
                                <button class="btn btn-sm btn-warning me-1" data-bs-toggle="modal"
                                    data-bs-target="#modalShow{{ $usuario->id_usuario }}">
                                    <i class="bi bi-eye-fill"></i>
                                </button>


                                <button class="btn btn-sm btn-primary me-1" data-bs-toggle="modal"
                                    data-bs-target="#modalEdit{{ $usuario->id_usuario }}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <form action="{{ route('destroy-user', $usuario->id_usuario) }}" method="post"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Tem certeza que quer apagar o usuário {{ $usuario->nome }}?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        @endforeach
                    @endforeach


                </tbody>
            </table>
        </div>


        <!-- Modal Novo Usuário -->
        @include('motorista.modais.novo')
@endsection