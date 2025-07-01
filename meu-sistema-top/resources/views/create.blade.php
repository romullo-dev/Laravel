<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    </head>
    
    <body>
        <h2>Cadastrar Usuário</h2>

        <form action="{{ route('user-store') }}" method="post">
            @csrf

            <label for="name">Nome :</label>
            <input type="text" placeholder="Digite seu nome" name="name" id="name" value="{{ old('name') }}" required>
            <label for="password">Senha :</label>
            <input type="password" placeholder="Digite sua senha" name="password" id="password" value="{{ old('password') }}" required>
            <label for="email">E-mail :</label>
            <input type="email" placeholder="Digite seu email" name="email" id="email" value="{{ old('email') }}" required>
            <button type="submit">Salver</button>
        </form>
    </body>
</html>
