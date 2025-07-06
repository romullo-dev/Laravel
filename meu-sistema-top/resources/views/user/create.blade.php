@extends('layouts.app')

@section('content')
    <main>


        <x-alert />
                <h2>Cadastrar Usuário</h2>

        <form action="{{ route('user-store') }}" method="POST" class="p-4 border rounded shadow-sm bg-light">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome"
                    value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha"
                    value="{{ old('password') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email"
                    value="{{ old('email') }}" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Salvar</button>
        </form>

    </main>
@endsection
