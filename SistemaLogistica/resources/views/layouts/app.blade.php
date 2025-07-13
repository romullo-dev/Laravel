<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>DNA Transportes</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        body {
            background-color: #f0f4f8;
        }

        .navbar {
            background: linear-gradient(90deg, #264653, #2a9d8f);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.4rem;
        }

        .dropdown-menu-dark {
            background-color: #1d3557;
        }

        .dropdown-item:hover {
            background-color: #457b9d;
        }

        footer {
            background-color: #e9ecef;
            padding: 1rem 0;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="{{ route('dashboard') }}">DNA Transportes</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">

                        <li class="nav-item">
                            <a class="nav-link text-white" href="?rastreio">
                                <i class="bi bi-truck-front-fill me-1"></i> Rastreio
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="operacionalDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-gear-wide-connected me-1"></i> Operacional
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                                <li><a class="dropdown-item" href="?rotas"><i class="bi bi-signpost"></i> Rotas</a></li>
                                <li><a class="dropdown-item" href="?rotasAjuste"><i class="bi bi-map-fill"></i> Ajuste de Rotas</a></li>
                                <li><a class="dropdown-item" href="?pedidos"><i class="bi bi-box"></i> Pedidos</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="cadastrosDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-plus-fill me-1"></i> Cadastros
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                                <li><a class="dropdown-item" href="?veiculo"><i class="bi bi-truck"></i> Veículo</a></li>
                                <li><a class="dropdown-item" href="{{ route('motorista.index') }}"><i class="bi bi-person-badge"></i> Motorista</a></li>
                                <li><a class="dropdown-item" href="{{ route('read-user') }}"><i class="bi bi-people"></i> Usuários</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="?cotacao">
                                <i class="bi bi-calculator me-1"></i> Cotação
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="?AWB">
                                <i class="bi bi-airplane-engines-fill me-1"></i> Tracking Aéreo
                            </a>
                        </li>

                        <!-- Usuário / Logout -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light ms-2" href="#" role="button"
                                data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle fs-5"></i>
                                {{ Auth::user()->nome ?? Auth::user()->user }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                                <li>
                                    <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right me-2"></i> Sair
                                    </a>
                                </li>
                            </ul>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-4">
        @yield('content')
    </main>

    <footer class="text-center text-muted">
        <hr>
        <p>DNA Transportes &copy; {{ date('Y') }} - Todos os direitos reservados.</p>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
