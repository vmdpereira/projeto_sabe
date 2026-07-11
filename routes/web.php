<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\QuestionController;

Route::get('/', [QuestionController::class, 'index']);
Route::get('/responder', [QuestionController::class, 'studentForm']);
Route::post('/responder', [QuestionController::class, 'submitStudentForm']);
Route::delete('/submissions/{id}', [QuestionController::class, 'destroySubmission']);

// Rota temporária estéril para rodar migrações e seeders no Render (bypassa a checagem de sessão)
Route::get('/migrar-banco-sabe', function () {
    try {
        // Executa as migrações de tabelas
        Artisan::call('migrate', ['--force' => true]);
        
        // Executa o seeder das perguntas padrão do TCC
        Artisan::call('db:seed', ['--force' => true]);
        
        return '<h2>Sucesso: Banco de dados MySQL migrado e semeado com sucesso!</h2><a href="/">Ir para o Painel Gestor</a>';
    } catch (\Exception $e) {
        return '<h2>Erro ao migrar banco de dados:</h2><pre>' . $e->getMessage() . '</pre>';
    }
})->withoutMiddleware([
    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
    \Illuminate\Cookie\Middleware\EncryptCookies::class,
    \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class
]);
