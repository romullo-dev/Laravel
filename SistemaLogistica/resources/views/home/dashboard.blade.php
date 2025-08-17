@extends('layouts.app')

@section('content')
<style>
    /* HERO */
    .hero-section {
        background: linear-gradient(135deg, #264653, #2a9d8f);
        color: #fff;
        padding: 120px 30px;
        position: relative;
        text-align: center;
        border-radius: 0 0 60px 60px;
    }

    .hero-section h1 {
        font-size: 3rem;
        font-weight: 900;
    }

    .hero-section p {
        font-size: 1.3rem;
        margin-top: 1rem;
        opacity: 0.9;
    }

    .btn-cta {
        margin-top: 2rem;
        border-radius: 50px;
        font-weight: 600;
        padding: 0.8rem 2.2rem;
        border: 2px solid #fff;
        color: #fff;
        transition: 0.3s;
    }

    .btn-cta:hover {
        background-color: #fff;
        color: #2a9d8f;
        transform: scale(1.05);
    }

    /* SEÇÕES */
    .section-title {
        font-weight: 800;
        font-size: 2rem;
        margin-bottom: 40px;
        color: #264653;
    }

    .story-card, .feature-card {
        border-radius: 20px;
        padding: 2rem;
        transition: all 0.3s ease;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        background-color: #fff;
    }

    .story-card:hover, .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.12);
    }

    .story-icon {
        font-size: 2.5rem;
        color: #2a9d8f;
    }

    .story-year {
        font-weight: bold;
        color: #264653;
        font-size: 1.2rem;
    }

    .feature-card i {
        font-size: 3rem;
        color: #2a9d8f;
    }

    .bg-light-custom {
        background-color: #f0f4f8;
        padding: 60px 0;
    }
</style>

{{-- HERO --}}
<div class="container-fluid d-flex flex-column justify-content-center align-items-center text-center text-white" 
     style="height: 90vh; min-height: 500px; background: linear-gradient(135deg, #264653, #0e0e0e); position: relative; overflow: hidden;">
    
    <!-- Caminhão de fundo -->
    <img src="{{ asset('images/caminhao.png') }}" 
         alt="Caminhão DNA" 
         style="position: absolute; bottom: 0; right: 0; max-width: 60%; opacity: 0.15; ;">

    <div class="px-3" style="z-index: 1;">
        <h1 class="display-1 fw-bold mb-3" style="text-shadow: 2px 2px 12px rgba(0, 0, 0, 0);">
            DNA Transportes
        </h1>
        <p class="lead mb-4" style="max-width: 700px;">
            Logística inteligente para um mundo em constante movimento.
        </p>
        <a href="#historia" class="btn btn-outline-light btn-lg rounded-pill shadow-sm">
            Nossa Jornada <i class="bi bi-chevron-double-down ms-2"></i>
        </a>
    </div>
</div>


{{-- HISTÓRIA --}}
<div class="container my-5" id="historia">
    <h2 class="text-center section-title">🌍 Nossa Jornada</h2>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="story-card">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-lightning-charge-fill story-icon me-3"></i>
                    <div>
                        <div class="story-year">2010</div>
                        <h5 class="mb-0">Nasce a DNA Transportes</h5>
                    </div>
                </div>
                <p>Começamos com 3 caminhões e um propósito: entregar mais que produtos, entregar confiança.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="story-card">
                <div class="d-flex align-items-center mb-3">
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
            <div class="story-card">
                <div class="d-flex align-items-center mb-3">
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
            <div class="story-card">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-stars story-icon me-3"></i>
                    <div>
                        <div class="story-year">2024</div>
                        <h5 class="mb-0">Liderança Nacional</h5>
                    </div>
                </div>
                <p>Com mais de 100 veículos e cobertura nacional, somos referência em logística inteligente.</p>
            </div>
        </div>
    </div>
</div>

{{-- MISSÃO --}}
<div class="bg-light-custom">
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
            <div class="feature-card">
                <i class="bi bi-truck-front"></i>
                <h5 class="fw-bold mt-3">Frota Moderna</h5>
                <p>Veículos com tecnologia de ponta, seguros e conectados em tempo real.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card">
                <i class="bi bi-speedometer"></i>
                <h5 class="fw-bold mt-3">Eficiência Logística</h5>
                <p>Monitoramento ativo, previsão de rota e entrega pontual garantida.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card">
                <i class="bi bi-heart-pulse"></i>
                <h5 class="fw-bold mt-3">Atendimento Humanizado</h5>
                <p>Relacionamento próximo com o cliente e suporte proativo em todas as etapas.</p>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="#" class="btn btn-cta">
            Acesse nossas rotas <i class="bi bi-map-fill ms-2"></i>
        </a>
    </div>
</div>
@endsection
