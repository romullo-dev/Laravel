<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


    </head>
    
    <body>
        <div class="container mt-4">
            <form action="index.php" method="post" enctype="multipart/form-data" id="funcionarioForm">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input type="text" id="nomeCompleto" name="nomeCompleto" class="form-control" placeholder="Ex.: Maria Oliveira" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Ex.: 123.456.789-00" maxlength="11" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nome" class="form-label">User</label>
                        <input type="text" name="user" id="user" class="form-control" placeholder="user" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="text" id="senha" name="senha" class="form-control" placeholder="Ex.: 1234" maxlength="14" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Telefone</label>
                        <input type="tel" id="telefone" name="telefone" class="form-control" placeholder="Ex.: (11) 91234-5678" maxlength="15" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cargo" class="form-label">Tipo</label>
                        <select id="id_tipo" name="id_tipo" class="form-select" required>
                            <option value="">Selecione...</option>
                            <option value="Motorista">Motorista</option>
                            <option value="ADM">ADM</option>
                            <option value="Usuario">Usuário</option>
                            <option value="Cliente">Cliente</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="id_status_func" class="form-label">Status do Funcionário</label>
                        <select id="id_status_func" name="id_status_func" class="form-select" required>
                            <option value="">Selecione...</option>
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Ex.: teste@teste.com" maxlength="255" required>
                    </div>

                    <!-- Campo de Upload de Foto -->
                    <div class="col-md-6 mb-3">
                        <label for="foto" class="form-label">Foto do Funcionário</label>
                        <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" name="cadastroUsuario" class="btn btn-success" style="background-color: #3e84b0;">Cadastrar Funcionário</button>
                    <button type="reset" class="btn btn-danger">Limpar Campos</button>
                </div>
            </form>
        </div>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</html>
