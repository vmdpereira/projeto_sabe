<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Projeto SABE - Sistema de Apoio ao Bem-Estar Estudantil. Aplicação de ferramentas de RH para o monitoramento do bem-estar na Etec de Registro.">
    <title>Projeto SABE - Monitoramento do Bem-Estar Estudantil</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

    <!-- Header / Navbar -->
    <header class="navbar">
        <div class="navbar-container">
            <a href="#" class="logo">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="logo-icon"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path></svg>
                <span>SABE</span>
            </a>
            <nav class="nav-menu">
                <a href="#apresentacao" class="nav-link active">Apresentação</a>
                <a href="#objetivos" class="nav-link">Objetivos</a>
                <a href="#metodologia" class="nav-link">Metodologia</a>
                <a href="#viabilidade" class="nav-link">Pesquisa</a>
                <a href="#funcionamento" class="nav-link">IBEET & Farol</a>
                <a href="#simulador" class="nav-link highlight">Painel Gestor</a>
                <a href="/responder" class="nav-link" target="_blank">Responder (Aluno)</a>
                <a href="#cronograma" class="nav-link">Cronograma</a>
            </nav>
            <button class="menu-toggle" id="menuToggle" aria-label="Abrir menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <!-- Mobile Menu Drawer -->
    <div class="mobile-menu" id="mobileMenu">
        <a href="#apresentacao" class="mobile-link">Apresentação</a>
        <a href="#objetivos" class="mobile-link">Objetivos</a>
        <a href="#metodologia" class="mobile-link">Metodologia</a>
        <a href="#viabilidade" class="mobile-link">Pesquisa</a>
        <a href="#funcionamento" class="mobile-link">IBEET & Farol</a>
        <a href="#simulador" class="mobile-link">Painel Gestor</a>
        <a href="/responder" class="mobile-link" target="_blank">Responder (Aluno)</a>
        <a href="#cronograma" class="mobile-link">Cronograma</a>
    </div>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-bg-glow"></div>
        <div class="hero-container">
            <div class="badge-container">
                <span class="hero-badge">Proposta de TCC - Recursos Humanos</span>
            </div>
            <h1 class="hero-title">
                Aplicação de Ferramentas de Recursos Humanos no Ambiente Educacional:
                <span class="gradient-text">Projeto SABE</span>
            </h1>
            <p class="hero-subtitle">
                Uma proposta inovadora para o monitoramento contínuo do bem-estar estudantil e prevenção da evasão no contexto da Etec de Registro.
            </p>
            <div class="authors-box">
                <p class="authors-label">Desenvolvido por:</p>
                <div class="authors-names">
                    <span class="author"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="icon"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Hanna Karoline da S. G. Santos</span>
                    <span class="author"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="icon"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Gabriel Pereira Rocha dos Santos</span>
                </div>
                <p class="orientador">Orientador: Prof. Carlos Alberto Soares de Lima</p>
            </div>
            <div class="hero-actions">
                <a href="#simulador" class="btn btn-primary btn-glow">Painel Gestor Etec</a>
                <a href="/responder" target="_blank" class="btn btn-secondary">Portal do Aluno (Responder)</a>
            </div>
        </div>
    </section>

    <!-- Key Statistics Row -->
    <section class="quick-stats">
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-num color-red">90,8%</div>
                <p class="stat-desc">dos respondentes apontam a sobrecarga como causa principal de evasão escolar.</p>
            </div>
            <div class="stat-card">
                <div class="stat-num color-violet">97,2%</div>
                <p class="stat-desc">aprovam a sinalização discreta de estresse para a Orientação Pedagógica.</p>
            </div>
            <div class="stat-card">
                <div class="stat-num color-teal">96,3%</div>
                <p class="stat-desc">da comunidade escolar apoia a aplicação imediata do projeto-piloto.</p>
            </div>
        </div>
    </section>

    <!-- Main Content Layout -->
    <main class="content-wrapper">

        <!-- 1. Apresentação (Introdução e Justificativa) -->
        <section id="apresentacao" class="scroll-section">
            <div class="section-header">
                <span class="section-tag">01. Apresentação</span>
                <h2 class="section-title">Tema e Justificativa</h2>
                <div class="title-bar"></div>
            </div>
            
            <div class="grid grid-2">
                <div class="card p-lg">
                    <h3 class="card-title text-gradient-violet"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="card-title-icon"><line x1="18" y1="2" x2="22" y2="6"></line><path d="M7.5 10.5L2 16v6h6l5.5-5.5"></path><path d="M11.5 6.5l5 5"></path><path d="M16 2.5l5.5 5.5"></path></svg> Introdução e Problematização</h3>
                    <p>
                        A gestão do bem-estar no ambiente educacional tem se tornado um tema crítico nos cursos técnicos. Dificuldades relacionadas à conciliação entre trabalho, estudos e responsabilidades pessoais impactam diretamente o desempenho acadêmico, a motivação e a permanência escolar. 
                    </p>
                    <p>
                        Tradicionalmente, as escolas concentram esforços no acompanhamento de indicadores acadêmicos puramente reativos (como frequência e rendimento), possuindo poucos mecanismos capazes de identificar sinais de desgaste mental e físico <strong>antes</strong> que se convertam em problemas graves.
                    </p>
                    <div class="quote-box">
                        <p class="question-text">
                            <strong>Problema de Pesquisa:</strong> Como a utilização de ferramentas inspiradas na área de Recursos Humanos, associadas a indicadores de bem-estar estudantil, pode contribuir para o acompanhamento preventivo dos estudantes da Etec de Registro?
                        </p>
                    </div>
                </div>

                <div class="card p-lg">
                    <h3 class="card-title text-gradient-teal"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="card-title-icon"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> Justificativa do Projeto SABE</h3>
                    <p>
                        O <strong>Projeto SABE (Sistema de Apoio ao Bem-Estar Estudantil)</strong> compreende o aluno como o principal colaborador da instituição. Adaptando conceitos consagrados da gestão de pessoas — como monitoramento de indicadores de clima e análise preventiva de dados —, o projeto propõe duas ferramentas essenciais:
                    </p>
                    <ul class="fancy-list">
                        <li>
                            <strong class="color-violet">Índice IBEET:</strong> Um diagnóstico bimestral abrangente que cruza 4 dimensões essenciais do bem-estar estudantil.
                        </li>
                        <li>
                            <strong class="color-teal">Check-in SABE:</strong> Um monitoramento rápido semanal (aplicado às sextas-feiras) que atua como termômetro contínuo.
                        </li>
                    </ul>
                    <p>
                        Ao estruturar esses indicadores dinâmicos sob o <strong>Sistema de Faróis (Verde, Amarelo e Vermelho)</strong>, a escola ganha a habilidade de intervir ativamente e estruturar ações de acolhimento preventivas de forma humanizada e imparcial.
                    </p>
                </div>
            </div>
        </section>

        <!-- 2. Objetivos -->
        <section id="objetivos" class="scroll-section">
            <div class="section-header">
                <span class="section-tag">02. Foco Estratégico</span>
                <h2 class="section-title">Objetivos do Projeto</h2>
                <div class="title-bar"></div>
            </div>

            <div class="card-glow mb-lg">
                <div class="p-lg">
                    <h3 class="target-title"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="color-violet"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg> Objetivo Geral</h3>
                    <p class="text-large">
                        Desenvolver e propor a implementação do <strong>Projeto SABE</strong>, utilizando ferramentas inspiradas na área de Recursos Humanos para monitorar o bem-estar dos estudantes, subsidiar a tomada de decisões da gestão escolar e contribuir para a permanência e o sucesso acadêmico na Etec de Registro.
                    </p>
                </div>
            </div>

            <div class="grid grid-3">
                <div class="card p-md border-hover-violet">
                    <div class="card-num">01</div>
                    <h4 class="card-subtitle">Diagnóstico Estratégico</h4>
                    <p class="text-sm">Identificar fatores relacionados ao bem-estar estudantil que possam influenciar negativamente o desempenho acadêmico e a permanência nos cursos.</p>
                </div>
                <div class="card p-md border-hover-teal">
                    <div class="card-num">02</div>
                    <h4 class="card-subtitle">Aplicação do IBEET</h4>
                    <p class="text-sm">Aplicar bimestralmente o Índice de Bem-Estar Estudantil Técnico para avaliar as condições cognitivas, físicas, de rotina e de suporte dos alunos.</p>
                </div>
                <div class="card p-md border-hover-violet">
                    <div class="card-num">03</div>
                    <h4 class="card-subtitle">Check-in Semanal</h4>
                    <p class="text-sm">Realizar monitoramento contínuo das turmas, identificando rapidamente possíveis picos de sobrecarga, desmotivação ou estresse.</p>
                </div>
                <div class="card p-md border-hover-teal">
                    <div class="card-num">04</div>
                    <h4 class="card-subtitle">Sistema de Faróis</h4>
                    <p class="text-sm">Traduzir as percepções individuais em alertas visuais de grupo (Verde, Amarelo e Vermelho) preservando o anonimato individual.</p>
                </div>
                <div class="card p-md border-hover-violet">
                    <div class="card-num">05</div>
                    <h4 class="card-subtitle">Cruzamento de Dados</h4>
                    <p class="text-sm">Analisar os resultados de bem-estar de forma integrada a indicadores tradicionais (frequência, faltas e menções MB, B, R, I).</p>
                </div>
                <div class="card p-md border-hover-teal">
                    <div class="card-num">06</div>
                    <h4 class="card-subtitle">Ação Preventiva</h4>
                    <p class="text-sm">Fornecer dados confiáveis para que a gestão possa formular estratégias eficazes de acolhimento e melhoria do clima escolar.</p>
                </div>
            </div>
        </section>

        <!-- 3. Metodologia -->
        <section id="metodologia" class="scroll-section">
            <div class="section-header">
                <span class="section-tag">03. Metodologia</span>
                <h2 class="section-title">Estrutura da Pesquisa e Etapas</h2>
                <div class="title-bar"></div>
            </div>

            <div class="grid grid-3 mb-lg">
                <div class="card p-md text-center">
                    <div class="icon-circle color-violet-bg">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    </div>
                    <h4 class="mt-sm">Pesquisa Aplicada</h4>
                    <p class="text-xs text-secondary mt-xs">Focada no desenvolvimento de soluções práticas para necessidades reais de acompanhamento da Etec.</p>
                </div>
                <div class="card p-md text-center">
                    <div class="icon-circle color-teal-bg">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                    </div>
                    <h4 class="mt-sm">Abordagem Mista</h4>
                    <p class="text-xs text-secondary mt-xs">Análise quantitativa (dados dos questionários e gráficos) combinada com análise qualitativa (relatos das dores discentes).</p>
                </div>
                <div class="card p-md text-center">
                    <div class="icon-circle color-violet-bg">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                    </div>
                    <h4 class="mt-sm">Estudo de Caso</h4>
                    <p class="text-xs text-secondary mt-xs">Investigação detalhada baseada na comunidade acadêmica e nos desafios locais da Etec de Registro.</p>
                </div>
            </div>

            <!-- Etapas de Implantação -->
            <div class="timeline-wrapper card p-lg">
                <h3 class="timeline-title mb-lg"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="color-teal"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Etapas da Proposta SABE</h3>
                
                <div class="steps-container">
                    <div class="step-item">
                        <div class="step-marker">1</div>
                        <div class="step-content">
                            <h4>Etapa 1: Diagnóstico de Viabilidade</h4>
                            <p class="text-sm text-secondary">
                                Aplicação de questionário diagnóstico inicial (109 participantes) para mapear o interesse e avaliar as lacunas institucionais de comunicação e sobrecarga.
                            </p>
                        </div>
                    </div>
                    
                    <div class="step-item">
                        <div class="step-marker">2</div>
                        <div class="step-content">
                            <h4>Etapa 2: Aplicação do Índice IBEET</h4>
                            <p class="text-sm text-secondary">
                                Diagnóstico bimestral abrangente baseado em 14 perguntas divididas em 4 eixos específicos de avaliação do bem-estar. Coleta em períodos-chave de avaliação acadêmica.
                            </p>
                        </div>
                    </div>

                    <div class="step-item">
                        <div class="step-marker">3</div>
                        <div class="step-content">
                            <h4>Etapa 3: Monitoramento com Check-in SABE</h4>
                            <p class="text-sm text-secondary">
                                Acompanhamento semanal rápido (preferencialmente às sextas-feiras) focado em humor, disposição e cansaço, agilizando ações corretivas de urgência.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. Análise da Pesquisa de Viabilidade -->
        <section id="viabilidade" class="scroll-section">
            <div class="section-header">
                <span class="section-tag">04. Resultados da Pesquisa</span>
                <h2 class="section-title">Pesquisa Diagnóstica de Viabilidade</h2>
                <div class="title-bar"></div>
            </div>

            <p class="section-intro mb-lg">
                Pesquisa realizada de <strong>09/04/2026 a 23/04/2026</strong> com uma amostra de <strong>109 respondentes</strong> (100 alunos, 6 professores, 3 gestores/coordenadores). Os resultados validaram a urgência da proposta.
            </p>

            <div class="dashboard-grid">
                <!-- Tab Menu for Charts -->
                <div class="dashboard-menu card">
                    <h4 class="menu-header">Selecione a Pergunta:</h4>
                    <div class="tab-list" id="chartTabs">
                        <button class="tab-btn active" data-chart="0">Q1. Vínculo com a Unidade</button>
                        <button class="tab-btn" data-chart="1">Q2. Período de Estudos</button>
                        <button class="tab-btn" data-chart="2">Q3. Fator de Evasão</button>
                        <button class="tab-btn" data-chart="3">Q4. Canais de Apoio Atuais</button>
                        <button class="tab-btn" data-chart="4">Q5. Utilidade do Farol</button>
                        <button class="tab-btn" data-chart="5">Q6. Sinalização Discreta</button>
                        <button class="tab-btn" data-chart="6">Q7. Ajuste de Planejamento</button>
                        <button class="tab-btn" data-chart="7">Q8. Impacto no Clima Escolar</button>
                        <button class="tab-btn" data-chart="8">Q9. Validade do IBEET</button>
                        <button class="tab-btn" data-chart="9">Q10. Fortalecimento da Gestão</button>
                        <button class="tab-btn" data-chart="10">Q11. Adesão ao Projeto Piloto</button>
                    </div>
                </div>

                <!-- Display area for active Chart -->
                <div class="dashboard-view card p-lg">
                    <div class="chart-header">
                        <h3 id="chartTitle">Q1. Qual o seu vínculo com a instituição?</h3>
                        <p id="chartInterpretation" class="text-sm text-secondary">Ampla representatividade de estudantes no diagnóstico da unidade.</p>
                    </div>
                    <div class="chart-container">
                        <canvas id="sabeChart"></canvas>
                    </div>
                    <div class="chart-conclusion" id="chartConclusion">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="color-teal"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                        <span>Representatividade: 91,7% de Alunos, com participação de Professores (5,5%), Coordenadores, Orientadores e Direção.</span>
                    </div>
                </div>
            </div>

            <!-- Qualitative Analysis (Dores Reais) -->
            <div class="grid grid-2 mt-lg">
                <div class="card p-lg border-hover-red">
                    <h3 class="card-title text-gradient-red"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="card-title-icon"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> Dores Reais (Análise Qualitativa)</h3>
                    <p class="text-sm">
                        Os relatos abertos evidenciaram desafios graves que os números brutos ocultavam. Foram identificados três grandes núcleos de dor:
                    </p>
                    <div class="pain-points">
                        <div class="pain-item">
                            <span class="pain-badge color-red-bg">Exaustão Extrema</span>
                            <p class="text-xs">Estudantes relatam que o cansaço acumulado faz com que cheguem a "repensar se valeu a pena entrar na escola".</p>
                        </div>
                        <div class="pain-item">
                            <span class="pain-badge color-red-bg">Logística Crítica</span>
                            <p class="text-xs">Alunos do período integral que moram em cidades vizinhas sofrem com longos tempos de transporte, sacrificando tempo de estudo e sono.</p>
                        </div>
                        <div class="pain-item">
                            <span class="pain-badge color-red-bg">Apelo por Empatia</span>
                            <p class="text-xs">Alunos pontuam a importância de que a escola reconheça que quedas de rendimento muitas vezes decorrem de esgotamento e não de falta de empenho.</p>
                        </div>
                    </div>
                </div>

                <div class="card p-lg border-hover-violet">
                    <h3 class="card-title text-gradient-violet"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="card-title-icon"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg> Lacunas de Processos Identificadas</h3>
                    <ul class="styled-list">
                        <li>
                            <strong>Lacuna de Participação & Sobrecarga:</strong>
                            O esgotamento mental foi evidenciado pela dificuldade de encontrar tempo para responder à pesquisa em meio ao período de provas bimestrais.
                        </li>
                        <li>
                            <strong>Lacuna de Reciprocidade:</strong>
                            A atual cultura escolar é excessivamente voltada a prazos e notas, demandando equilíbrio com a gestão do bem-estar.
                        </li>
                        <li>
                            <strong>Lacuna de Comunicação:</strong>
                            76,1% dos alunos desconhecem a existência de canais de suporte ou não sabem como acessá-los, validando o uso de painéis visuais simples e acessíveis.
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- 5. Funcionamento IBEET & Farol -->
        <section id="funcionamento" class="scroll-section">
            <div class="section-header">
                <span class="section-tag">05. Estrutura Técnica</span>
                <h2 class="section-title">Funcionamento do IBEET e Sistema de Faróis</h2>
                <div class="title-bar"></div>
            </div>

            <!-- Os 4 Eixos do IBEET -->
            <h3 class="sub-section-title mb-md">Os 4 Eixos de Avaliação</h3>
            <div class="grid grid-4 mb-lg">
                <div class="axis-card">
                    <div class="axis-letter">A</div>
                    <h4>Bem-Estar Cognitivo e Físico</h4>
                    <p class="text-xs text-secondary">Avalia aspectos de concentração, qualidade do sono, estabilidade emocional e enfrentamento de exigências acadêmicas.</p>
                </div>
                <div class="axis-card">
                    <div class="axis-letter">B</div>
                    <h4>Equilíbrio Estudo & Rotina</h4>
                    <p class="text-xs text-secondary">Mede a capacidade de conciliar a carga de estudos técnicos com as obrigações profissionais e a vida pessoal.</p>
                </div>
                <div class="axis-card">
                    <div class="axis-letter">C</div>
                    <h4>Clima Social & Escolar</h4>
                    <p class="text-xs text-secondary">Analisa a percepção de integração social do aluno, relacionamento com professores e sentimento de acolhimento na escola.</p>
                </div>
                <div class="axis-card">
                    <div class="axis-letter">D</div>
                    <h4>Suporte Institucional</h4>
                    <p class="text-xs text-secondary">Avaliador da confiabilidade e acessibilidade dos canais de apoio psicopedagógico providos pela instituição.</p>
                </div>
            </div>

            <!-- Sistema de Faróis Grid -->
            <div class="grid grid-2">
                <div class="card p-lg">
                    <h3 class="card-title text-gradient-teal"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="card-title-icon"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg> Mapeamento de Pontuações</h3>
                    <p class="text-sm mb-md">
                        O simulador calcula sua pontuação em tempo real baseando-se nas respostas de cada eixo. Cada questão utiliza uma escala de frequência de 1 a 5 pontos:
                    </p>
                    <div class="score-scale mb-md">
                        <div class="scale-item"><span>Nunca</span><strong>1 pt</strong></div>
                        <div class="scale-item"><span>Raramente</span><strong>2 pts</strong></div>
                        <div class="scale-item"><span>Às vezes</span><strong>3 pts</strong></div>
                        <div class="scale-item"><span>Frequentemente</span><strong>4 pts</strong></div>
                        <div class="scale-item"><span>Sempre</span><strong>5 pts</strong></div>
                    </div>
                    <p class="text-sm">
                        O Farol (Verde, Amarelo ou Vermelho) correspondente é exibido de acordo com a pontuação total do questionário dinâmico do banco de dados.
                    </p>
                </div>

                <div class="card p-lg">
                    <h3 class="card-title text-gradient-violet"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="card-title-icon"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> Sistema de Faróis do Projeto SABE</h3>
                    <div class="traffic-lights-vertical">
                        <div class="light-row border-green">
                            <div class="light-circle bg-green glowing-green"></div>
                            <div class="light-text">
                                <strong>Zona Verde: Bem-estar satisfatório</strong>
                                <span class="text-xs text-secondary">(Mais de 80% dos pontos possíveis) O aluno demonstra bom equilíbrio e resiliência.</span>
                            </div>
                        </div>
                        <div class="light-row border-yellow">
                            <div class="light-circle bg-yellow glowing-yellow"></div>
                            <div class="light-text">
                                <strong>Zona Amarela: Necessita atenção</strong>
                                <span class="text-xs text-secondary">(Entre 50% e 80% dos pontos possíveis) Indicativo de cansaço ou sobrecarga de rotina.</span>
                            </div>
                        </div>
                        <div class="light-row border-red">
                            <div class="light-circle bg-red glowing-red"></div>
                            <div class="light-text">
                                <strong>Zona Vermelha: Acompanhamento prioritário</strong>
                                <span class="text-xs text-secondary">(Abaixo de 50% dos pontos possíveis) Sinais críticos de esgotamento físico ou mental.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. Gestão Pedagógica - Painel da Direção -->
        <section id="simulador" class="scroll-section">
            <div class="section-header">
                <span class="section-tag">06. Monitoramento</span>
                <h2 class="section-title">Painel de Acompanhamento Pedagógico</h2>
                <div class="title-bar"></div>
            </div>

            <!-- Portal do Aluno CTA Card -->
            <div class="card p-lg mb-lg d-flex justify-between align-items-center flex-wrap gap-md" style="border: 1px solid rgba(20, 184, 166, 0.3); background: rgba(6, 9, 17, 0.4);">
                <div style="flex: 1; min-width: 300px;">
                    <h3 class="card-title text-gradient-teal" style="font-size: 1.4rem; margin-bottom: 0.25rem;">Portal de Resposta do Aluno</h3>
                    <p class="text-sm text-secondary">
                        Para registrar novas avaliações de estudantes, os alunos devem preencher o questionário IBEET no portal dedicado. O preenchimento é totalmente sigiloso e responsivo.
                    </p>
                </div>
                <a href="/responder" target="_blank" class="btn btn-primary btn-glow" style="white-space: nowrap; text-decoration: none;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="mr-xs" style="vertical-align: middle;"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                    Acessar Portal do Aluno
                </a>
            </div>

            <!-- Top Dashboard Stats -->
            <div class="grid grid-2">
                <!-- Left card: Real Class dashboard details -->
                <div class="card p-lg d-flex flex-col justify-between">
                    <div>
                        <h3 class="card-title text-gradient-teal">Visão Geral de Bem-Estar</h3>
                        <p class="text-xs text-secondary mb-md">
                            Como a gestão escolar visualiza as respostas consolidadas das turmas de forma anônima para orientar intervenções:
                        </p>

                        <!-- Weekly Class traffic light -->
                        <div class="live-farol-status border-{{ $classFarol }}" id="classFarolBox">
                            <div class="status-top">
                                <div class="live-light-dot bg-{{ $classFarol }} glowing-{{ $classFarol }}" id="classFarolDot"></div>
                                <span class="status-label" id="classFarolLabel">{{ $classFarolLabel }}</span>
                            </div>
                            <p class="status-desc text-xs" id="classFarolDesc">{{ $classFarolDesc }}</p>
                        </div>

                        <!-- Stats visualization from database -->
                        <div class="stats-breakdown-box mt-lg">
                            <h4 class="text-xs text-secondary mb-xs">Métricas Agregadas (Banco de Dados):</h4>
                            <div class="class-stat-row">
                                <span>Índice Geral de Bem-Estar:</span>
                                <strong id="classEnergyVal" class="{{ $wellnessClass }}">{{ $wellnessLabel }}</strong>
                            </div>
                            <div class="class-stat-row">
                                <span>Alunos em Risco Crítico:</span>
                                <strong id="classSupportVal" class="{{ $criticalClass }}">{{ $criticalLabel }}</strong>
                            </div>
                            <div class="class-stat-row">
                                <span>Total de Avaliações Recebidas:</span>
                                <strong class="color-teal" id="totalSubmissionsVal">{{ $totalSubmissions }} estudantes</strong>
                            </div>
                        </div>
                    </div>

                    <div class="info-alert mt-md">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="color-teal mr-xs" style="min-width: 18px;"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                        <span class="text-xxs text-secondary">O painel garante o sigilo individual das respostas de clima. As informações individuais de nome, idade e curso são registradas apenas para controle e apoio pedagógico.</span>
                    </div>
                </div>

                <!-- Right Card: Interactive Dynamic Charts -->
                <div class="card p-lg d-flex flex-col justify-between">
                    <div>
                        <h3 class="card-title text-gradient-violet">Gráficos Analíticos Consolidados</h3>
                        <p class="text-xs text-secondary mb-md">
                            Visualização de indicadores de clima estudantil baseados nas respostas dos alunos no MySQL:
                        </p>

                        <div class="charts-grid">
                            <div class="chart-card p-xs d-flex flex-col align-items-center">
                                <span class="text-xxs text-secondary mb-xs" style="font-weight: 600; text-transform: uppercase;">Distribuição dos Faróis</span>
                                <div style="position: relative; height: 180px; width: 100%;">
                                    <canvas id="farolChart"></canvas>
                                </div>
                            </div>
                            <div class="chart-card p-xs d-flex flex-col align-items-center">
                                <span class="text-xxs text-secondary mb-xs" style="font-weight: 600; text-transform: uppercase;">Média por Curso</span>
                                <div style="position: relative; height: 180px; width: 100%;">
                                    <canvas id="courseChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Evaluated Students Table -->
            <div class="card p-lg mt-lg">
                <h3 class="card-title text-gradient-teal">Acompanhamento Individualizado</h3>
                <p class="text-xs text-secondary mb-md">
                    Lista completa de alunos que responderam à escala IBEET de bem-estar estudantil:
                </p>
                
                <div style="overflow-x: auto;">
                    <table class="students-table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Idade</th>
                                <th>Curso</th>
                                <th>Pontuação IBEET</th>
                                <th>Status Farol</th>
                                <th>Data de Envio</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody id="studentsTableBody">
                            @forelse($submissions as $s)
                            <tr data-id="{{ $s->id }}">
                                <td><strong>{{ $s->name }}</strong></td>
                                <td>{{ $s->age }} anos</td>
                                <td><span class="badge-course">{{ $s->course }}</span></td>
                                <td><strong>{{ $s->score }}</strong> pts</td>
                                <td><span class="status-badge status-{{ strtolower($s->farol) }}">{{ $s->farol }}</span></td>
                                <td class="text-secondary text-xs">{{ $s->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <button class="btn-delete-student" onclick="deleteSubmission({{ $s->id }})" title="Excluir Registro">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-secondary py-lg">Nenhuma resposta gravada no banco de dados. Divulgue o portal para os alunos.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- 8. Cronograma -->
        <section id="cronograma" class="scroll-section">
            <div class="section-header">
                <span class="section-tag">08. Planejamento</span>
                <h2 class="section-title">Cronograma de Atividades (2026)</h2>
                <div class="title-bar"></div>
            </div>

            <div class="card p-lg overflow-x">
                <table class="premium-table">
                    <thead>
                        <tr>
                            <th>Atividades Desenvolvidas</th>
                            <th>Fev</th>
                            <th>Mar</th>
                            <th>Abr</th>
                            <th>Mai</th>
                            <th>Jun</th>
                            <th>Jul</th>
                            <th>Ago</th>
                            <th>Set</th>
                            <th>Out</th>
                            <th>Nov</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pesquisa do tema</td>
                            <td class="text-center highlight-cell"><span class="cron-check">✔</span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Definição do tema</td>
                            <td class="text-center highlight-cell"><span class="cron-check">✔</span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Pesquisa bibliográfica</td>
                            <td></td>
                            <td class="text-center highlight-cell"><span class="cron-check">✔</span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Coleta de Dados</td>
                            <td></td>
                            <td></td>
                            <td class="text-center highlight-cell"><span class="cron-check">✔</span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Apresentação e discussão dos dados</td>
                            <td></td>
                            <td></td>
                            <td class="text-center highlight-cell"><span class="cron-check">✔</span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Elaboração do projeto</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center highlight-cell"><span class="cron-check">✔</span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Entrega do projeto</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center highlight-cell"><span class="cron-check">✔</span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- 9. Referências -->
        <section id="referencias" class="scroll-section">
            <div class="section-header">
                <span class="section-tag">09. Fontes</span>
                <h2 class="section-title">Referências Bibliográficas</h2>
                <div class="title-bar"></div>
            </div>

            <div class="card p-lg">
                <ul class="references-list">
                    <li>
                        <strong>CHIAVENATO, Idalberto.</strong> <em>Gestão de Pessoas: O Novo Papel do Recrutamento e Seleção.</em> 5. ed. São Paulo: Manole, 2020.
                    </li>
                    <li>
                        <strong>GIL, Antonio Carlos.</strong> <em>Como Elaborar Projetos de Pesquisa.</em> 6. ed. São Paulo: Atlas, 2017.
                    </li>
                    <li>
                        <strong>LUZ, Ricardo.</strong> <em>Gestão do Clima Organizacional.</em> Rio de Janeiro: Qualitymark, 2003.
                    </li>
                    <li>
                        <strong>POPPER, K.R.</strong> <em>Conhecimento objetivo.</em> São Paulo: EDUSP, 1975.
                    </li>
                    <li>
                        <strong>SEVERINO, Antonio Joaquim.</strong> <em>Metodologia do trabalho científico.</em> 22. ed. rev. e ampl. São Paulo: Cortez, 2002.
                    </li>
                </ul>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-left">
                <div class="logo">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="logo-icon"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path></svg>
                    <span>Projeto SABE</span>
                </div>
                <p class="text-xs text-secondary mt-xs">
                    Sistema de Apoio ao Bem-Estar Estudantil. Uma ponte baseada em dados entre a comunidade discente e a gestão pedagógica.
                </p>
            </div>
            <div class="footer-right">
                <p class="text-xs text-secondary">
                    ETEC de Registro - Sala Descentralizada de Cajati / SP.
                </p>
                <p class="text-xxs text-secondary-dark mt-xs">
                    Trabalho de Conclusão de Curso em Recursos Humanos &copy; 2026. Todos os direitos reservados.
                </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        window.farolDistribution = @json($farolDistribution);
        window.courseAverages = @json($courseAverages);
        window.csrfToken = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
