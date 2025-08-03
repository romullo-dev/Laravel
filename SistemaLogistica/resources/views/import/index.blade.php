<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Upload XML</title>
</head>
<body>
    <h1>Enviar arquivo XML</h1>

    <form action="{{ route('importacao.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="xml" accept=".xml" required>
        <button type="submit">Enviar</button>
    </form>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>
