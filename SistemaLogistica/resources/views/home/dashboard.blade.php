@extends('layouts.app')

@section('content')
<style>
    .hero-section {
        background: url('https://imgs.search.brave.com/LtjDzEn8ZNgEZTs0iiQ_HULD1u5Pw_GAQpWdbdq64KI/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTQx/MzAwNTgxNi9wdC9m/b3RvL3RydWNrLW9u/LXRoZS1yb2FkLWNh/cmdvLXRyYW5zcG9y/dGF0aW9uLWNvbmNl/cHQtM2QtaWxsdXN0/cmF0aW9uLmpwZz9z/PTYxMng2MTImdz0w/Jms9MjAmYz1Jb1g2/RFEzSVcwXy1kSmZV/eFF4MGJub09fd2J4/dUdBQXFhclNGaHN0/QldNPQ') center/cover no-repeat;
        color: white;
        padding: 120px 30px;
        position: relative;
    }

    .hero-overlay {
        background: rgba(0, 0, 0, 0.7);
        padding: 60px 30px;
        border-radius: 15px;
    }

    .card-story {
        transition: all 0.3s ease;
        border: none;
        border-left: 6px solid #0d6efd;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .card-story:hover {
        transform: scale(1.02);
        border-left: 6px solid #198754;
    }

    .story-icon {
        font-size: 2rem;
        color: #0d6efd;
    }

    .story-year {
        font-weight: bold;
        color: #6c757d;
        font-size: 1.1rem;
    }

    .btn-cta {
        transition: 0.3s;
    }

    .btn-cta:hover {
        transform: scale(1.05);
    }

    .section-title {
        font-weight: bold;
        margin-bottom: 40px;
    }

    .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    }
</style>

{{-- HERO SECTION --}}
<div class="hero-section text-center">
    <div class="hero-overlay">
        <h1 class="display-4 fw-bold">DNA Transportes</h1>
        <p class="lead">Logística inteligente para um mundo em constante movimento.</p>
        <a href="#historia" class="btn btn-outline-light btn-lg mt-4 btn-cta">Explorar história <i class="bi bi-chevron-double-down ms-2"></i></a>
    </div>
</div>

{{-- HISTÓRIA --}}
<div class="container my-5" id="historia">
    <h2 class="text-center section-title">🌍 Nossa Jornada</h2>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card card-story p-4">
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-lightning-charge-fill story-icon me-3"></i>
                    <div>
                        <div class="story-year">2010</div>
                        <h5 class="mb-0">Nasce a DNA Transportes</h5>
                    </div>
                </div>
                <p>Iniciamos com 3 caminhões e um propósito: entregar mais que produtos, entregar confiança.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-story p-4">
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-geo-alt-fill story-icon me-3"></i>
                    <div>
                        <div class="story-year">2014</div>
                        <h5 class="mb-0">Expansão Regional</h5>
                    </div>
                </div>
                <p>Chegamos ao sudeste com nova frota e operações mais estratégicas, cobrindo SP, RJ e MG.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-story p-4">
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-cpu-fill story-icon me-3"></i>
                    <div>
                        <div class="story-year">2018</div>
                        <h5 class="mb-0">Tecnologia no DNA</h5>
                    </div>
                </div>
                <p>Implantamos rastreamento em tempo real, painel logístico e otimização de rotas com IA.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-story p-4">
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-stars story-icon me-3"></i>
                    <div>
                        <div class="story-year">2024</div>
                        <h5 class="mb-0">Liderança nacional</h5>
                    </div>
                </div>
                <p>Com mais de 100 veículos e cobertura nacional, somos referência em logística inteligente.</p>
            </div>
        </div>
    </div>
</div>

{{-- MISSÃO --}}
<div class="bg-light py-5">
    <div class="container text-center">
        <h2 class="section-title">🚀 Nossa Missão</h2>
        <p class="lead w-75 mx-auto">
            Fornecer soluções logísticas inteligentes, com alta performance e humanização, garantindo a satisfação do cliente em cada entrega.
        </p>
    </div>
</div>

{{-- DIFERENCIAIS --}}
<div class="container my-5">
    <h2 class="text-center section-title">🔎 O que nos torna únicos</h2>
    <div class="row text-center g-4">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm p-4 feature-card">
                <i class="bi bi-truck-front fs-1 text-primary"></i>
                <h5 class="fw-bold mt-3">Frota Moderna</h5>
                <p>Veículos com tecnologia de ponta, seguros e conectados em tempo real.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm p-4 feature-card">
                <i class="bi bi-speedometer fs-1 text-success"></i>
                <h5 class="fw-bold mt-3">Eficiência Logística</h5>
                <p>Monitoramento ativo, previsão de rota e entrega pontual garantida.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm p-4 feature-card">
                <i class="bi bi-heart-pulse fs-1 text-danger"></i>
                <h5 class="fw-bold mt-3">Atendimento Humanizado</h5>
                <p>Relacionamento próximo com o cliente e suporte proativo em todas as etapas.</p>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="#" class="btn btn-primary btn-lg px-5 btn-cta">
            Acesse nossas rotas <i class="bi bi-map-fill ms-2"></i>
        </a>
    </div>
</div>
@endsection
