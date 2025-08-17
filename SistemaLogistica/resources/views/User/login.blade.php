<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - DNA Transportes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg, #002b5c, #00344d);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .login-card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 30px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-card img {
            max-width: 120px;
            margin-bottom: 15px;
        }
        .login-card h2 {
            font-weight: 600;
            color: #002b5c;
            margin-bottom: 25px;
        }
        .btn-primary {
            background-color: #264653;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2a9d8f;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <img src="{{ asset('images/logo-dna.png') }}" alt="Logo DNA Transportes">
        <h2>DNA Transportes - Login</h2>

        @if ($errors->any())
            <div class="alert alert-danger text-start">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <div class="mb-3 text-start">
                <label for="user" class="form-label">Usuário</label>
                <input type="text" class="form-control" id="user" name="user" value="{{ old('user') }}" required autofocus>
            </div>

            <div class="mb-3 text-start">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
    </div>
</body>
</html>
