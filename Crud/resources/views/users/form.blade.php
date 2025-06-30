<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuario</title>
</head>
<body>
    <h2>Cadastrar Usuario</h2>

    <form action="" method="post">
        @csrf

        <label for="name">Nome: </label>
        <input type="text" placeholder="Nome" name="name" id="name">
        <label for="email">E-mail: </label>
        <input type="email" placeholder="email" name="email" id="email">
        <label for="password">Senha: </label>
        <input type="password" placeholder="password" name="password" id="password">

        <button type="submit">Cadastrar</button>
        

    </form>

    
</body>
</html>