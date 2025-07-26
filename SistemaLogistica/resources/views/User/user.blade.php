@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Usuários</h1>
        <!-- Botão para abrir o modal de novo usuário -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalNovoUsuario">
            <i class="bi bi-plus-circle-fill"></i> Novo Usuário
        </button>
    </div>

    <!-- Tabela de usuários -->
    <div class="card shadow-sm rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Tipo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id_usuario }}</td>
                            <td>{{ $usuario->nome }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ ucfirst($usuario->tipo_usuario) }}</td>
                            <td>
                                <div class="d-flex">
                                    <!-- Botão Visualizar -->
                                    <button type="button" class="btn btn-warning btn-sm me-1"
                                        title="Visualizar"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalShow{{ $usuario->id_usuario }}">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>

                                    <!-- Botão Editar -->
                                    <button type="button" class="btn btn-primary btn-sm me-1"
                                        title="Editar"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $usuario->id_usuario }}">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>

                                    <!-- Botão Excluir -->
                                    <form action="{{ route('destroy-user', $usuario->id_usuario) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Excluir">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Paginação -->
            <div class="d-flex justify-content-center mt-3">
                {{ $usuarios->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal: Novo Usuário -->
@include('user.modais.novo')

<!-- Modal: Editar para cada usuário -->
@foreach ($usuarios as $usuario)
    @include('user.modais.edit', ['usuario' => $usuario])
@endforeach

<!-- Modal: Visualizar para cada usuário (componente Blade) -->
@foreach ($usuarios as $usuario)
    @include('user.modais.show', ['usuario' => $usuario])
@endforeach


@endsection
