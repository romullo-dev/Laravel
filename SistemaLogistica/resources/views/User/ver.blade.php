@extends('layouts.app')

@section('content')
    {{-- Alertas de Sessão (dismissible) --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white rounded-top-3 p-3 d-flex justify-content-between align-items-center">
            <h4 class="mb-0">
                <i class="bi bi-person-circle me-2"></i> Detalhes do Usuário
            </h4>
            <a href="{{ route('read-user') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left me-2"></i> Voltar
            </a>
        </div>
        <div class="card-body p-4">
            <div class="row g-4">
                {{-- Coluna da Foto --}}
                <div class="col-md-4 text-center d-flex flex-column align-items-center justify-content-center">
                    @if ($usuario->foto)
                        <img src="{{ asset('storage/' . $usuario->foto) }}" alt="Foto do Usuário"
                            class="img-thumbnail rounded-circle mb-3 shadow"
                            style="width: 180px; height: 180px; object-fit: cover;">
                    @else
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded-circle mb-3 shadow-sm"
                            style="width: 180px; height: 180px;">
                            <span>Sem Foto</span>
                        </div>
                    @endif
                    <h5 class="mt-3 text-break">{{ $usuario->nome }}</h5>
                    <p class="text-muted small">@ {{ $usuario->user }}</p>
                </div>

                {{-- Coluna dos Dados --}}
                <div class="col-md-8">
                    <ul class="list-group list-group-flush border rounded-3 overflow-hidden">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong><i class="bi bi-envelope-fill me-2 text-primary"></i>Email:</strong>
                            <span>{{ $usuario->email }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong><i class="bi bi-key-fill me-2 text-primary"></i>Tipo:</strong>
                            <span>{{ ucfirst($usuario->tipo_usuario) }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong><i class="bi bi-person-vcard-fill me-2 text-primary"></i>CPF:</strong>
                            <span>{{ $usuario->cpf }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong><i class="bi bi-telephone-fill me-2 text-primary"></i>Telefone:</strong>
                            <span>{{ $usuario->telefone }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong><i class="bi bi-shield-fill-check me-2 text-primary"></i>Status:</strong>
                            <span>{{ ucfirst($usuario->status_funcionario) }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-light">
                            <strong><i class="bi bi-calendar-plus-fill me-2 text-primary"></i>Criado em:</strong>
                            <span class="text-muted">{{ $usuario->created_at->format('d/m/Y H:i') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-light">
                            <strong><i class="bi bi-calendar-check-fill me-2 text-primary"></i>Última atualização:</strong>
                            <span class="text-muted">{{ $usuario->updated_at->format('d/m/Y H:i') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card-footer bg-light d-flex justify-content-end gap-2 p-3 rounded-bottom-3">
            <a href="{{ route('senha.user', ['id' => $usuario->id_usuario]) }}" class="btn btn-secondary">
                <i class="bi bi-key-fill me-2"></i> Mudar Senha
            </a>
        </div>
    </div>

    </div>
@endsection
