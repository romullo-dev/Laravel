<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <h1>Cadastrar usuário</h1>

    @if (session('success'))
        <p style="color : #086">
            {{ session('success') }}
        </p>
    @endif
    @if (session('error'))
        <p style="color : rgb(136, 0, 0)">
            {{ session('error') }}
        </p>
    @endif

    <form action="{{ route('user.store') }}" method="post">
        @csrf

        <label for="name">Nome :</label>
        <input type="text" name="name" id="name" placeholder="Digite seu nome" value="{{ old('name') }}" required>
        <br><br><br>
        <label for="email">E-mail :</label>
        <input type="email" name="email" id="email" placeholder="Digite seu email" value="{{ old('email') }}"
            required><br><br><br>

        <label for="password">Senha :</label>
        <input type="password" name="password" id="password" placeholder="Minino 6 caracteres"
            value="{{ old('password') }}" required><br><br><br>

        <button type="submit">Cadastrar</button>
    </form>



</body>

</html>