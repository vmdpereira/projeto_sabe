<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal do Aluno - Projeto SABE</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-darker: #060911;
            --bg-dark: #0b0f19;
            --bg-card: #111827;
            --text-primary: #f3f4f6;
            --text-secondary: #9ca3af;
            --primary: #8b5cf6;
            --primary-glow: rgba(139, 92, 246, 0.4);
            --teal: #14b8a6;
            --teal-glow: rgba(20, 184, 166, 0.3);
            --border-color: #1f2937;
            --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            
            --axis-a: #3b82f6;
            --axis-b: #10b981;
            --axis-c: #f59e0b;
            --axis-d: #ef4444;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--bg-darker);
            color: var(--text-primary);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1.5rem;
            position: relative;
            overflow-x: hidden;
        }

        /* Abstract glowing background blobs */
        body::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, var(--primary-glow) 0%, transparent 70%);
            top: -100px;
            right: -100px;
            z-index: 0;
        }

        body::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, var(--teal-glow) 0%, transparent 70%);
            bottom: -100px;
            left: -100px;
            z-index: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            background: rgba(17, 24, 39, 0.8);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            padding: 2.5rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
            z-index: 10;
            position: relative;
        }

        /* Header logo */
        .app-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 1.8rem;
            color: var(--text-primary);
            text-decoration: none;
            margin-bottom: 0.5rem;
        }

        .logo svg {
            color: var(--teal);
        }

        .logo span {
            background: linear-gradient(135deg, var(--teal), var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .subtitle {
            font-size: 0.9rem;
            color: var(--text-secondary);
            max-width: 320px;
            margin: 0 auto;
        }

        /* Step Panels */
        .step-panel {
            display: none;
        }

        .step-panel.active {
            display: block;
            animation: fadeIn 0.4s ease forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Forms styling */
        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .form-input {
            width: 100%;
            background: rgba(6, 9, 17, 0.6);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 0.9rem 1.2rem;
            color: var(--text-primary);
            font-size: 1rem;
            transition: var(--transition-smooth);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--teal);
            box-shadow: 0 0 0 4px var(--teal-glow);
        }

        select.form-input {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%239ca3af' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.2rem;
        }

        /* Wizard styling */
        .wizard-progress-bar {
            height: 6px;
            background: var(--border-color);
            border-radius: 3px;
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .wizard-progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--teal), var(--primary));
            width: 0%;
            transition: var(--transition-smooth);
        }

        .axis-badge {
            display: inline-block;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
            text-transform: uppercase;
            margin-bottom: 1rem;
            letter-spacing: 0.05em;
        }

        .badge-axis-a { background: rgba(59, 130, 246, 0.15); color: var(--axis-a); border: 1px solid rgba(59, 130, 246, 0.3); }
        .badge-axis-b { background: rgba(16, 185, 129, 0.15); color: var(--axis-b); border: 1px solid rgba(16, 185, 129, 0.3); }
        .badge-axis-c { background: rgba(245, 158, 11, 0.15); color: var(--axis-c); border: 1px solid rgba(245, 158, 11, 0.3); }
        .badge-axis-d { background: rgba(239, 68, 68, 0.15); color: var(--axis-d); border: 1px solid rgba(239, 68, 68, 0.3); }

        .question-text {
            font-family: 'Outfit', sans-serif;
            font-size: 1.25rem;
            line-height: 1.6;
            margin-bottom: 2rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .options-list {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-bottom: 2rem;
        }

        .option-item {
            display: flex;
            align-items: center;
            background: rgba(6, 9, 17, 0.4);
            border: 1px solid var(--border-color);
            border-radius: 14px;
            padding: 1rem 1.25rem;
            cursor: pointer;
            transition: var(--transition-smooth);
            position: relative;
        }

        .option-item:hover {
            background: rgba(31, 41, 55, 0.4);
            border-color: rgba(20, 184, 166, 0.5);
        }

        .option-item input[type="radio"] {
            display: none;
        }

        .radio-circle {
            width: 20px;
            height: 20px;
            border: 2px solid var(--text-secondary);
            border-radius: 50%;
            margin-right: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: var(--transition-smooth);
        }

        .option-item input[type="radio"]:checked + .radio-circle {
            border-color: var(--teal);
            background: var(--teal);
        }

        .option-item input[type="radio"]:checked + .radio-circle::after {
            content: '';
            width: 8px;
            height: 8px;
            background: var(--bg-darker);
            border-radius: 50%;
        }

        .option-item.selected {
            background: rgba(20, 184, 166, 0.08);
            border-color: var(--teal);
            box-shadow: 0 0 12px rgba(20, 184, 166, 0.1);
        }

        .option-label {
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--text-primary);
        }

        /* Buttons container */
        .btn-group {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.9rem 1.8rem;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-smooth);
            border: none;
            font-family: 'Inter', sans-serif;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--teal), var(--primary));
            color: #ffffff;
            flex-grow: 1;
            box-shadow: 0 4px 12px rgba(20, 184, 166, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(20, 184, 166, 0.4);
        }

        .btn-primary:disabled {
            background: #27272a;
            color: #71717a;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .btn-secondary {
            background: rgba(31, 41, 55, 0.6);
            color: var(--text-primary);
            border: 1px solid var(--border-color);
        }

        .btn-secondary:hover:not(:disabled) {
            background: rgba(55, 65, 81, 0.8);
        }

        .btn-secondary:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Success screen styling */
        .success-box {
            text-align: center;
            padding: 1rem 0;
        }

        .success-icon {
            width: 72px;
            height: 72px;
            background: rgba(20, 184, 166, 0.1);
            color: var(--teal);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            border: 2px solid rgba(20, 184, 166, 0.2);
            animation: scaleIn 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        @keyframes scaleIn {
            from { transform: scale(0.5); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        .success-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1rem;
        }

        .success-desc {
            font-size: 0.95rem;
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .container {
                padding: 1.5rem;
                border-radius: 16px;
            }
            .question-text {
                font-size: 1.1rem;
            }
            .btn {
                padding: 0.8rem 1.2rem;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- 1. Header -->
        <header class="app-header">
            <a href="#" class="logo">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                <span>SABE</span>
            </a>
            <p class="subtitle" id="appSubtitle">Avaliação Semanal de Clima e Bem-Estar Acadêmico</p>
        </header>

        <!-- 2. Step 1: Student Metadata Form -->
        <div class="step-panel active" id="panelIdentification">
            <form id="studentDataForm">
                <div class="form-group">
                    <label class="form-label" for="studentName">Nome Completo</label>
                    <input type="text" id="studentName" class="form-input" placeholder="Seu nome completo" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label class="form-label" for="studentAge">Idade</label>
                    <input type="number" id="studentAge" class="form-input" placeholder="Ex: 17" min="10" max="100" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="studentCourse">Curso</label>
                    <select id="studentCourse" class="form-input" required>
                        <option value="" disabled selected>Selecione seu curso...</option>
                        <option value="Administração">Administração</option>
                        <option value="Desenvolvimento de Sistemas">Desenvolvimento de Sistemas</option>
                        <option value="Recursos Humanos">Recursos Humanos</option>
                        <option value="Logística">Logística</option>
                        <option value="Contabilidade">Contabilidade</option>
                        <option value="Redes de Computadores">Redes de Computadores</option>
                    </select>
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">Iniciar Avaliação</button>
                </div>
            </form>
        </div>

        <!-- 3. Step 2: Questionnaire Wizard -->
        <div class="step-panel" id="panelWizard">
            <div class="wizard-progress-bar">
                <div class="wizard-progress-fill" id="wizardProgressFill"></div>
            </div>
            
            <div class="wizard-content">
                <span class="axis-badge" id="axisBadge">Eixo</span>
                <h3 class="question-text" id="questionText">Texto da pergunta</h3>
                
                <div class="options-list">
                    <label class="option-item" data-value="1">
                        <input type="radio" name="ibeetOption" value="1">
                        <div class="radio-circle"></div>
                        <span class="option-label">Discordo Totalmente</span>
                    </label>
                    <label class="option-item" data-value="2">
                        <input type="radio" name="ibeetOption" value="2">
                        <div class="radio-circle"></div>
                        <span class="option-label">Discordo</span>
                    </label>
                    <label class="option-item" data-value="3">
                        <input type="radio" name="ibeetOption" value="3">
                        <div class="radio-circle"></div>
                        <span class="option-label">Neutro</span>
                    </label>
                    <label class="option-item" data-value="4">
                        <input type="radio" name="ibeetOption" value="4">
                        <div class="radio-circle"></div>
                        <span class="option-label">Concordo</span>
                    </label>
                    <label class="option-item" data-value="5">
                        <input type="radio" name="ibeetOption" value="5">
                        <div class="radio-circle"></div>
                        <span class="option-label">Concordo Totalmente</span>
                    </label>
                </div>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-secondary" id="btnPrev">Anterior</button>
                <button type="button" class="btn btn-primary" id="btnNext" disabled>Próxima</button>
            </div>
        </div>

        <!-- 4. Step 3: Success Screen -->
        <div class="step-panel" id="panelSuccess">
            <div class="success-box">
                <div class="success-icon">
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                </div>
                <h3 class="success-title">Avaliação Concluída!</h3>
                <p class="success-desc">
                    Obrigado por responder ao formulário. Suas respostas foram transmitidas com segurança para a coordenação pedagógica orientar ações de apoio e clima escolar.
                </p>
                <button type="button" class="btn btn-secondary w-full" onclick="window.location.reload()">Responder Novamente</button>
            </div>
        </div>
    </div>

    <!-- JS Logic -->
    <script>
        // Data injected from Laravel controller
        const questions = @json($questions);
        const csrfToken = "{{ csrf_token() }}";

        // Student Data
        let studentData = {
            name: '',
            age: 0,
            course: ''
        };

        // Answers Array
        let answers = new Array(questions.length).fill(null);
        let currentIndex = 0;

        // Dom Elements
        const panelIdentification = document.getElementById('panelIdentification');
        const panelWizard = document.getElementById('panelWizard');
        const panelSuccess = document.getElementById('panelSuccess');
        const appSubtitle = document.getElementById('appSubtitle');
        
        const studentDataForm = document.getElementById('studentDataForm');
        const wizardProgressFill = document.getElementById('wizardProgressFill');
        const axisBadge = document.getElementById('axisBadge');
        const questionText = document.getElementById('questionText');
        const optionItems = document.querySelectorAll('.option-item');
        const radioInputs = document.querySelectorAll('input[name="ibeetOption"]');
        const btnPrev = document.getElementById('btnPrev');
        const btnNext = document.getElementById('btnNext');

        // Step 1: Identification Form Submit
        studentDataForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            studentData.name = document.getElementById('studentName').value.trim();
            studentData.age = parseInt(document.getElementById('studentAge').value);
            studentData.course = document.getElementById('studentCourse').value;

            if (questions.length === 0) {
                alert("Erro: Não há perguntas cadastradas no banco de dados.");
                return;
            }

            // Move to Step 2
            panelIdentification.classList.remove('active');
            panelWizard.classList.add('active');
            appSubtitle.innerText = `Participante: ${studentData.name} (${studentData.course})`;
            
            // Initial render
            renderQuestion();
        });

        // Step 2: Render Wizard Question
        function renderQuestion() {
            const q = questions[currentIndex];
            
            // Set Progress
            const progress = ((currentIndex + 1) / questions.length) * 100;
            wizardProgressFill.style.width = `${progress}%`;
            
            // Set Axis badge
            axisBadge.innerText = q.axis_label;
            axisBadge.className = `axis-badge badge-axis-${q.axis.toLowerCase()}`;
            
            // Set text
            questionText.innerText = q.text;

            // Reset selected states
            optionItems.forEach(item => {
                item.classList.remove('selected');
                const radio = item.querySelector('input[type="radio"]');
                radio.checked = false;
            });

            // Load answer if exists
            const savedValue = answers[currentIndex];
            if (savedValue !== null) {
                const targetOption = document.querySelector(`.option-item[data-value="${savedValue}"]`);
                if (targetOption) {
                    targetOption.classList.add('selected');
                    targetOption.querySelector('input').checked = true;
                }
                btnNext.disabled = false;
            } else {
                btnNext.disabled = true;
            }

            // Controls
            btnPrev.disabled = currentIndex === 0;
            if (currentIndex === questions.length - 1) {
                btnNext.innerText = "Enviar Respostas";
            } else {
                btnNext.innerText = "Próxima";
            }
        }

        // Option click trigger select
        optionItems.forEach(item => {
            item.addEventListener('click', () => {
                const val = parseInt(item.getAttribute('data-value'));
                answers[currentIndex] = val;
                
                // Toggle active visual states
                optionItems.forEach(o => o.classList.remove('selected'));
                item.classList.add('selected');
                item.querySelector('input').checked = true;
                
                btnNext.disabled = false;
            });
        });

        // Next Button Handler
        btnNext.addEventListener('click', () => {
            if (currentIndex < questions.length - 1) {
                currentIndex++;
                renderQuestion();
            } else {
                submitSurvey();
            }
        });

        // Prev Button Handler
        btnPrev.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                renderQuestion();
            }
        });

        // Submit to database via AJAX
        function submitSurvey() {
            // Disable button
            btnNext.disabled = true;
            btnNext.innerText = "Processando...";

            // Compute scores
            let scoreTotal = 0;
            let scoresByAxis = { A: 0, B: 0, C: 0, D: 0 };
            
            answers.forEach((val, idx) => {
                scoreTotal += val;
                const axis = questions[idx].axis;
                if (scoresByAxis[axis] !== undefined) {
                    scoresByAxis[axis] += val;
                }
            });

            // Determine Farol
            const maxScore = questions.length * 5;
            const verdeBoundary = maxScore * 0.8;
            const amareloBoundary = maxScore * 0.5;
            let farol = 'Vermelho';
            if (scoreTotal >= verdeBoundary) farol = 'Verde';
            else if (scoreTotal >= amareloBoundary) farol = 'Amarelo';

            // Prepare POST body data
            const formData = new FormData();
            formData.append('name', studentData.name);
            formData.append('age', studentData.age);
            formData.append('course', studentData.course);
            formData.append('score', scoreTotal);
            formData.append('farol', farol);
            formData.append('axis_a', scoresByAxis.A);
            formData.append('axis_b', scoresByAxis.B);
            formData.append('axis_c', scoresByAxis.C);
            formData.append('axis_d', scoresByAxis.D);
            formData.append('_token', csrfToken);

            fetch('/responder', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // Transition to success step panel
                    panelWizard.classList.remove('active');
                    panelSuccess.classList.add('active');
                    appSubtitle.innerText = "Avaliação Enviada";
                } else {
                    alert("Erro ao enviar avaliação: " + (data.message || 'Desconhecido'));
                    btnNext.disabled = false;
                    btnNext.innerText = "Enviar Respostas";
                }
            })
            .catch(err => {
                console.error("Submission error:", err);
                alert("Erro de conexão com o servidor. Verifique a internet.");
                btnNext.disabled = false;
                btnNext.innerText = "Enviar Respostas";
            });
        }
    </script>
</body>
</html>
