@extends('layouts.app')

@section('content')
    <h1>Editar Usuário</h1>

   <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
    <input type="email" name="email" value="{{ old('email', $user->email) }}" required>

    <button type="submit">Atualizar</button>
</form>

@endsection
