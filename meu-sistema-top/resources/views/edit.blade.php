@extends('layouts.app')

@section('content')
    <h1>Editar Usuário</h1>

    <form action="{{ route('user.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $usuario->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $usuario->email) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection
