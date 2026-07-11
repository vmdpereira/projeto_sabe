<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\QuestionController;

Route::get('/', [QuestionController::class, 'index']);
Route::get('/responder', [QuestionController::class, 'studentForm']);
Route::post('/responder', [QuestionController::class, 'submitStudentForm']);
Route::delete('/submissions/{id}', [QuestionController::class, 'destroySubmission']);

// Rota temporária com depuração detalhada para rodar migrações e seeders no Render
Route::get('/migrar-banco-sabe', function () {
    // Desativa o buffer para enviar a resposta em tempo real
    if (ob_get_level() > 0) {
        ob_end_clean();
    }
    
    header('Content-Type: text/html; charset=utf-8');
    
    echo "<h2>Iniciando Configuração do Banco de Dados SABE</h2>";
    echo "<p><strong>Driver:</strong> " . config('database.default') . "</p>";
    echo "<p><strong>Host:</strong> " . config('database.connections.mysql.host') . "</p>";
    echo "<p><strong>Porta:</strong> " . config('database.connections.mysql.port') . "</p>";
    echo "<p><strong>Banco de Dados:</strong> " . config('database.connections.mysql.database') . "</p>";
    echo "<p><strong>Usuário:</strong> " . config('database.connections.mysql.username') . "</p>";
    echo "<hr>";
    echo "<p>Tentando conectar e rodar as migrações... (Isso pode demorar alguns segundos)</p>";
    flush();

    try {
        // Executa as migrações de tabelas
        $migrationOutput = Artisan::call('migrate', ['--force' => true]);
        echo "<p style='color: green;'>&check; Tabelas criadas com sucesso no MySQL!</p>";
        flush();
        
        // Executa o seeder das perguntas padrão do TCC
        $seederOutput = Artisan::call('db:seed', ['--force' => true]);
        echo "<p style='color: green;'>&check; Banco populado com as 14 perguntas padrão!</p>";
        flush();
        
        echo "<h3 style='color: #14b8a6;'>Processo concluído com absoluto sucesso!</h3>";
        echo "<a href='/' style='display: inline-block; padding: 0.8rem 1.5rem; background: #8b5cf6; color: white; text-decoration: none; border-radius: 8px; font-weight: bold;'>Acessar Painel Gestor Etec</a>";
    } catch (\Exception $e) {
        echo "<h3 style='color: #ef4444;'>Erro crítico durante a conexão ou migração:</h3>";
        echo "<pre style='background: #1f2937; color: #f3f4f6; padding: 1rem; border-radius: 8px; overflow-x: auto; font-family: monospace;'>" . $e->getMessage() . "</pre>";
        echo "<p><strong>Dica:</strong> Certifique-se de que os dados do banco de dados MySQL configurados na aba <strong>Environment</strong> do Render estão corretos e que o banco de dados aceita conexões externas.</p>";
    }
})->withoutMiddleware([
    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
    \Illuminate\Cookie\Middleware\EncryptCookies::class,
    \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class
]);
