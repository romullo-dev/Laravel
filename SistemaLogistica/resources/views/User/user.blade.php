@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <h3 class="fw-bold d-flex align-items-center">
            <i class="bi bi-people-fill me-2 fs-3 text-primary"></i> Usuários
        </h3>

        <button class="btn btn-success d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#modalNovoUsuario">
            <i class="bi bi-person-plus-fill fs-5"></i> Novo Usuário
        </button>
    </div>

    <!-- Filtros -->
    <form method="GET" class="row g-3 mb-4 align-items-center">
        <div class="col-md-5">
            <input type="text" name="busca" class="form-control form-control-lg" placeholder="Buscar por nome ou CPF" value="{{ request('busca') }}">
        </div>

        <div class="col-md-3">
            <select name="tipo" class="form-select form-select-lg">
                <option value="">Tipo de Usuário</option>
                <option value="admin" @selected(request('tipo') == 'admin')>Admin</option>
                <option value="operador" @selected(request('tipo') == 'operador')>Operador</option>
                <option value="motorista" @selected(request('tipo') == 'motorista')>Motorista</option>
            </select>
        </div>

        <div class="col-md-3">
            <select name="status" class="form-select form-select-lg">
                <option value="">Status</option>
                <option value="Ativo" @selected(request('status') == 'Ativo')>Ativo</option>
                <option value="Inativo" @selected(request('status') == 'Inativo')>Inativo</option>
            </select>
        </div>

        <div class="col-md-1 d-grid">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </form>

    <!-- Tabela -->
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped table-hover align-middle bg-white border">
            <thead class="table-light">
                <tr>
                    <th scope="col">Criação</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $usuario->nome }}</td>
                        <td>{{ $usuario->user }}</td>
                        <td>
                            @php
                                $tipos = [
                                    'admin' => ['label' => 'Admin', 'class' => 'bg-danger'],
                                    'operador' => ['label' => 'Operador', 'class' => 'bg-success'],
                                    'motorista' => ['label' => 'Motorista', 'class' => 'bg-warning text-dark']
                                ];
                                $tipo = $tipos[$usuario->tipo_usuario] ?? ['label' => 'Desconhecido', 'class' => 'bg-secondary'];
                            @endphp
                            <span class="badge {{ $tipo['class'] }}">{{ $tipo['label'] }}</span>
                        </td>
                        <td>
                            @php
                                $status = [
                                    'Ativo' => ['label' => 'Ativo', 'class' => 'bg-success text-white'],
                                    'Inativo' => ['label' => 'Inativo', 'class' => 'bg-secondary']
                                ];
                                $stat = $status[$usuario->status_funcionario] ?? ['label' => 'Desconhecido', 'class' => 'bg-secondary'];
                            @endphp
                            <span class="badge {{ $stat['class'] }}">{{ $stat['label'] }}</span>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning btn-sm me-1" data-bs-toggle="tooltip" title="Visualizar" data-bs-target="#modalShow{{ $usuario->id_usuario }}" data-bs-toggle="modal">
                                <i class="bi bi-eye-fill"></i>
                            </button>

                            <button type="button" class="btn btn-primary btn-sm me-1" data-bs-toggle="tooltip" title="Editar" data-bs-target="#modalEdit{{ $usuario->id_usuario }}" data-bs-toggle="modal">
                                <i class="bi bi-pencil-square"></i>
                            </button>

                            <form action="{{ route('destroy-user', $usuario->id_usuario) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que quer apagar o usuário {{ $usuario->nome }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Excluir">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">Nenhum usuário encontrado.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginação -->
    <div class="d-flex justify-content-center mt-3">
        {{ $usuarios->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- Modais -->
@include('User.modais.novo')
@include('User.modais.show')

@foreach ($usuarios as $usuario)
    @include('User.modais.edit', ['usuario' => $usuario])
@endforeach

@endsection

@section('scripts')
<script>
    // Ativar tooltips do Bootstrap
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endsection
