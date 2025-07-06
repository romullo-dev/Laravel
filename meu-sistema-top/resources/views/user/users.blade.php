@extends('layouts.app')

@section('content')

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

    <h1 class="mb-4">Lista de Usuários</h1>

    @if ($usuarios->isEmpty())
        <div class="alert alert-warning">
            Nenhum usuário encontrado.
        </div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ação
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm">
                                <i class="bi bi-eye"></i> Visualizar
                            </a>
     

                            <a href="{{ route('user.edit',['user' => $usuario->id] ) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-fill"></i> Editar
                            </a>


                            <form action="{{ route('user-delete', $usuario->id) }}" method="post" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Tem certeza que quer apagar o usuário {{ $usuario->name }}?')">
                                    <i class="bi bi-trash-fill"></i> Apagar
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="d-flex justify-content-center">
    {{ $usuarios->links('pagination::bootstrap-5') }}
</div>



    <a href="{{ route('user.create') }}" class="btn btn-success">Cadastrar Novo Usuário</a>

@endsection
