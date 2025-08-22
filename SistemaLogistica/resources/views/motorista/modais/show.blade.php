@foreach ($usuarios as $usuario)
    <div class="modal fade" id="modalShow{{ $usuario->motorista->id_motorista }}" tabindex="-1"
        aria-labelledby="modalShowLabel{{ $usuario->motorista->id_motorista }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-light">
                    <h5 class="modal-title text-dark fw-bold" id="modalShowLabel{{ $usuario->id_usuario }}">
                        <i class="bi bi-person-lines-fill me-2"></i> Detalhes do Usuário
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>


                <div class="card shadow-lg border-0 rounded-3">
            
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <p><strong>Nome:</strong> {{ $usuario->nome }}</p>
                                <p><strong>Usuário:</strong> {{ $usuario->user }}</p>
                                <p><strong>Email:</strong> {{ $usuario->email }}</p>
                                <p><strong>CPF:</strong> {{ $usuario->cpf }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>CNH:</strong> {{ $usuario->motorista->cnh ?? '—' }}</p>
                                <p><strong>Validade CNH:</strong> {{ $usuario->motorista->validade_cnh ?? '—' }}</p>
                                <p><strong>Status:</strong> 
                                    <span class="badge {{ $usuario->status_funcionario == 'ativo' ? 'bg-success' : 'bg-danger' }}">
                                        {{ ucfirst($usuario->status_funcionario) }}
                                    </span>
                                </p>
                                <p><strong>Criado em:</strong> {{ $usuario->motorista->created_at->format('d/m/Y H:i') }}</p>
                                <p><strong>Editado em:</strong> {{ $usuario->motorista->updated_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            
                
                <div class="modal-footer bg-light">
                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg me-1"></i> Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach
