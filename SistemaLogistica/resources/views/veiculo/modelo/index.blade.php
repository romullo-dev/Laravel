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

  <div class="container mt-4">
    <div class="card shadow rounded-4 border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-4">
      <h5 class="mb-0"><i class="bi bi-truck-front me-2"></i>Cadastro de Modelo de Veículo</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('modelo.store') }}" method="POST">
      @csrf

      <div class="row mb-3">
        <div class="col-md-6">
        <label for="marca" class="form-label">Marca</label>
        <input type="text" class="form-control" id="marca" name="marca" placeholder="Ex: Scania" required>
        </div>

        <div class="col-md-6">
        <label for="modelo" class="form-label">Modelo</label>
        <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ex: R440" required>
        </div>
      </div>

      <div class="mb-6">
        <label for="categoria" class="form-label">
        <i class="bi bi-truck me-1"></i>Categoria do Caminhão
        </label>
        <select class="form-select" id="categoria" name="categoria" required>
        <option value="" disabled selected>Selecione a categoria</option>
        <option value="Cavalo Mecânico">Cavalo Mecânico</option>
        <option value="Truck">Truck</option>
        <option value="Toco">Toco</option>
        <option value="Bitrem">Bitrem</option>
        <option value="Rodotrem">Rodotrem</option>
        </select>
      </div>



      <div class="col-md-6">
        <input type="hidden" name="status" value="ativo">
      </div>
    </div>

    <div class="mb-3">
      <label for="descricao" class="form-label">Descrição</label>
      <textarea class="form-control" id="descricao" name="descricao" rows="3"
      placeholder="Descreva o modelo, características, ano, etc."></textarea>
    </div>

    <div class="d-flex justify-content-end">
      <button type="submit" class="btn btn-success">
      <i class="bi bi-check-circle me-1"></i>Salvar
      </button>
    </div>
    </form>
    </div>
  </div>
  </div>
@endsection