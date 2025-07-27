@extends('layouts.app')

@section('content')

    {{-- Mensagens de sucesso/erro --}}
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

        {{-- Cabeçalho --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold"><i class="bi bi-people-fill me-2"></i>Veículo</h3>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalNovoVeiculo">
                <i class="bi bi-person-plus-fill me-1"></i> Novo Veículo
            </button>
        </div>

        {{-- Filtros --}}
        <form method="GET" class="row g-2 mb-3">
            <div class="col-md-4">
                <input type="text" name="busca" class="form-control" placeholder="Buscar por nome ou CPF" value="{{ request('busca') }}">
            </div>
            <div class="col-md-3">
                <select name="tipo" class="form-select">
                    <option value="">Tipo de Usuário</option>
                    <option value="admin" {{ request('tipo') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="operador" {{ request('tipo') == 'operador' ? 'selected' : '' }}>Operador</option>
                    <option value="motorista" {{ request('tipo') == 'motorista' ? 'selected' : '' }}>Motorista</option>
                </select>
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">Status</option>
                    <option value="ativo" {{ request('status') == 'ativo' ? 'selected' : '' }}>Ativo</option>
                    <option value="inativo" {{ request('status') == 'inativo' ? 'selected' : '' }}>Inativo</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-outline-primary w-100">
                    <i class="bi bi-search"></i> Filtrar
                </button>
            </div>
        </form>

        {{-- Tabela de motoristas --}}
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
                   
                </tbody>
            </table>
        </div>
        <br>

        {{-- <div class="d-flex justify-content-center">
            {{ /*$usuarios->links('pagination::bootstrap-5')*/ }}

        </div> --}}

        @include('veiculo.veiculo.modais.novo')

    </div>
@endsection
