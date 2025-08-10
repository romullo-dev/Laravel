<div class="modal fade" id="modalEdit{{ $rotas->id_rotas }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('rotas.store') }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Atualizar Status da Rota #{{ $rotas->id_rotas }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="rota_id" value="{{ $rotas->id_rotas }}">
                <div class="mb-3">
                    <label for="status_{{ $rotas->id_rotas }}" class="form-label">Novo Status</label>
                    <select class="form-select" id="status_{{ $rotas->id_rotas }}" name="status" required>
                        <option value="" disabled selected>Selecione o status</option>
                        <option value="Em trânsito">Em trânsito</option>
                        <option value="Finalizado">Finalizado</option>
                        <option value="Cancelado">Cancelado</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="observacao_{{ $rotas->id_rotas }}" class="form-label">Observações (opcional)</label>
                    <textarea class="form-control" id="observacao_{{ $rotas->id_rotas }}" name="observacao" rows="3" placeholder="Detalhes adicionais..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</div>
