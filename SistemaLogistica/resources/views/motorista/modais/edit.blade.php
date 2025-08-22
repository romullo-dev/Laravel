<div class="modal fade" id="modalEdit{{ $usuario->motorista->id_motorista }}" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('motorista.show', $usuario->motorista->id_motorista) }}" enctype="multipart/form-data"
            class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Editar Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body row g-2">
                <div class="col-md-12">
                    <label>Nome</label>
                    <input name="nome" class="form-control" value="{{ $usuario->nome }}" disabled>
                </div>
                <div class="col-md-6">
                    <label>CPF</label>
                    <input name="cpf" class="form-control" maxlength="11" value="{{ $usuario->cpf }}" disabled>
                </div>

                <div class="col-md-6">
                    <label>CNH</label>
                    <input name="cpf" class="form-control" maxlength="11" value="{{ $usuario->motorista->cnh }}" required>
                </div>

                <div class="col-md-6">
                    <label>Categoria</label>
                    <input name="cpf" class="form-control" maxlength="11" value="{{ $usuario->motorista->cnh }}" required>
                </div>

                <div class="col-md-6">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" class="form-select" required>
                        <option value="{{ $usuario->motorista->categoria }}">{{ $usuario->motorista->categoria }}</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="AB">AB</option>
                    </select>
                </div>

                <div class="col-md-12">
                    <label for="validade_cnh">Validade da CNH</label>
                    <input 
                        type="date" 
                        name="validade_cnh" 
                        value="{{ old('validade_cnh', $usuario->motorista->validade_cnh ?? '') }}" 
                        class="form-control" 
                    >
                </div>
                

                

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn btn-success">Salvar Alterações</button>
            </div>
        </form>
    </div>
</div>