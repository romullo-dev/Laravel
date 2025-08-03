@extends('layouts.app')

@section('content')
    {{-- Mensagens de sucesso/erro --}}
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="container-fluid py-4">

        {{-- Cabeçalho --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold"><i class="bi bi-people-fill me-2"></i>Motoristas</h3>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalNovoMotorista">
                <i class="bi bi-person-plus-fill me-1"></i> Novo Motorista
            </button>
        </div>

        {{-- Filtros --}}
        <form method="GET" class="row g-2 mb-3">
            <div class="col-md-4">
                <input type="text" name="busca" class="form-control" placeholder="Buscar por nome ou CPF"
                    value="{{ request('busca') }}">
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

            <h1>Importação</h1>


            <form action="{{ route('importe.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <label for="arquivo">Importe o XML</label>
                <input type="file" name="arquivo" id="arquivo" accept=".xml" required>

                <br><br>

                <label for="arquivo">Importe o PDF da nota fiscal</label>
                <input type="file" name="arquivo" id="arquivo" accept=".xml" required>

                <br><br>

                <button type="submit">Enviar</button>
            </form>


        </div>
        <br>


    </div>
@endsection
