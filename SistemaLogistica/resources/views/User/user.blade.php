@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Cadastro de Usuário</h2>

    <form action="{{ route('create-store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-md-6 mb-3">
                <label for="nome_usuario" class="form-label">Nome Completo</label>
                <input type="text" name="nome_usuario" id="nome_usuario" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="user" class="form-label">Usuário (Login)</label>
                <input type="text" name="user" id="user" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="tipo_usuario" class="form-label">Tipo de Usuário</label>
                <select name="tipo_usuario" id="tipo_usuario" class="form-select" required>
                    <option value="">Selecione...</option>
                    <option value="Motorista">Motorista</option>
                    <option value="Torre">Torre</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" id="cpf" maxlength="11" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="status_funcionario" class="form-label">Status</label>
                <select name="status_funcionario" id="status_funcionario" class="form-select" required>
                    <option value="">Selecione...</option>
                    <option value="Ativo">Ativo</option>
                    <option value="Inativo">Inativo</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="foto" class="form-label">Foto do Usuário</label>
                <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
            </div>

        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <button type="reset" class="btn btn-secondary">Limpar</button>
        </div>
    </form>
</div>
@endsection
