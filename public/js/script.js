/* ==========================================================================
   NAVIGATION & MOBILE MENU
   ========================================================================== */
const menuToggle = document.getElementById('menuToggle');
const mobileMenu = document.getElementById('mobileMenu');
const mobileLinks = document.querySelectorAll('.mobile-link');
const navLinks = document.querySelectorAll('.nav-link');

// Toggle Mobile Menu
menuToggle.addEventListener('click', () => {
    mobileMenu.classList.toggle('open');
    menuToggle.classList.toggle('active');
});

// Close Mobile Menu on Link Click
mobileLinks.forEach(link => {
    link.addEventListener('click', () => {
        mobileMenu.classList.remove('open');
        menuToggle.classList.remove('active');
    });
});

// Scroll Spy navigation active states
window.addEventListener('scroll', () => {
    let current = '';
    const sections = document.querySelectorAll('section');
    const scrollPos = window.scrollY + 100;

    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
            current = section.getAttribute('id');
        }
    });

    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${current}`) {
            link.classList.add('active');
        }
    });
});

// Navbar background change on scroll (Slim Design)
window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.style.padding = '0.3rem 0';
        navbar.style.background = 'rgba(6, 9, 17, 0.9)';
    } else {
        navbar.style.padding = '0.6rem 0';
        navbar.style.background = 'rgba(11, 15, 25, 0.75)';
    }
});

/* ==========================================================================
   ADMINISTRATOR DASHBOARD DELETION FLOW
   ========================================================================== */
window.deleteSubmission = function(id) {
    if (!confirm("Tem certeza que deseja excluir esta avaliação de estudante? Os dados serão apagados do MySQL permanentemente e os gráficos serão recalculados.")) {
        return;
    }

    const formData = new FormData();
    formData.append('_method', 'DELETE');
    formData.append('_token', window.csrfToken);

    fetch('/submissions/' + id, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Remove row from list
            const rowToRemove = document.querySelector(`tr[data-id="${id}"]`);
            if (rowToRemove) {
                rowToRemove.remove();
            }
            alert(data.message);
            
            // Reload page to automatically redraw charts with new database aggregates
            window.location.reload();
        } else {
            alert("Erro ao excluir submissão.");
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("Erro de conexão ao tentar excluir o registro.");
    });
};

/* ==========================================================================
   PEDAGOGICAL CHART RENDERERS (CHART.JS)
   ========================================================================== */
document.addEventListener('DOMContentLoaded', () => {
    // 1. Render Farol Distribution Donut Chart
    const farolCtx = document.getElementById('farolChart');
    if (farolCtx) {
        const dist = window.farolDistribution || { verde: 0, amarelo: 0, vermelho: 0 };
        const total = dist.verde + dist.amarelo + dist.vermelho;
        
        new Chart(farolCtx, {
            type: 'doughnut',
            data: {
                labels: ['Verde', 'Amarelo', 'Vermelho'],
                datasets: [{
                    data: [dist.verde, dist.amarelo, dist.vermelho],
                    backgroundColor: ['#14b8a6', '#f59e0b', '#ef4444'],
                    borderColor: '#111827',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#9ca3af',
                            font: { family: 'Inter', size: 10 }
                        }
                    }
                },
                cutout: '65%'
            }
        });
    }

    // 2. Render Course Averages Bar Chart
    const courseCtx = document.getElementById('courseChart');
    if (courseCtx) {
        const averages = window.courseAverages || [];
        const labels = averages.map(a => a.course);
        const data = averages.map(a => a.avg_score);

        new Chart(courseCtx, {
            type: 'bar',
            data: {
                labels: labels.length ? labels : ['Sem dados'],
                datasets: [{
                    label: 'Média de Bem-Estar',
                    data: data.length ? data : [0],
                    backgroundColor: 'rgba(139, 92, 246, 0.6)',
                    borderColor: '#8b5cf6',
                    borderWidth: 1.5,
                    borderRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        min: 0,
                        max: 70,
                        ticks: {
                            color: '#9ca3af',
                            font: { family: 'Inter', size: 10 }
                        },
                        grid: { color: '#1f2937' }
                    },
                    x: {
                        ticks: {
                            color: '#9ca3af',
                            font: { family: 'Inter', size: 9 },
                            callback: function(val, index) {
                                const label = this.getLabelForValue(val);
                                return label.length > 12 ? label.substring(0, 10) + '...' : label;
                            }
                        },
                        grid: { display: false }
                    }
                }
            }
        });
    }
});
