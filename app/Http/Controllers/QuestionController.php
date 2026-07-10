<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\StudentSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display the Pedagogical Dashboard (Gestor Panel).
     */
    public function index()
    {
        // 1. Get all questions in DB to compute maximum score bounds
        $questionsCount = Question::count();
        $N = $questionsCount > 0 ? $questionsCount : 14;
        $maxPossibleScore = $N * 5;
        
        // 2. Get student submissions
        $submissions = StudentSubmission::orderBy('created_at', 'desc')->get();
        $totalSubmissions = $submissions->count();
        
        // 3. Compute dynamic class dashboard values based on database records
        if ($totalSubmissions > 0) {
            $avgScore = StudentSubmission::avg('score');
            
            // Count faróis
            $verdeCount = StudentSubmission::where('farol', 'Verde')->count();
            $amareloCount = StudentSubmission::where('farol', 'Amarelo')->count();
            $vermelhoCount = StudentSubmission::where('farol', 'Vermelho')->count();
            
            // Compute percentage of Farol Vermelho (high-risk students)
            $criticalCount = $vermelhoCount;
            $criticalClass = $criticalCount > 0 ? "color-red" : "color-green";
            $criticalLabel = $criticalCount === 1 ? "1 aluno em alerta" : "{$criticalCount} alunos em alerta";
            
            // Calculate average wellness percentage
            $wellnessPct = round(($avgScore / $maxPossibleScore) * 100);
            
            // Collective Traffic Light
            if ($avgScore >= $maxPossibleScore * 0.8) {
                $classFarol = 'green';
                $classFarolLabel = 'Farol Coletivo: Verde';
                $classFarolDesc = 'Média geral de bem-estar satisfatória. O planejamento escolar pode seguir o fluxo comum.';
                $wellnessClass = "color-green";
            } elseif ($avgScore >= $maxPossibleScore * 0.5) {
                $classFarol = 'yellow';
                $classFarolLabel = 'Farol Coletivo: Amarelo';
                $classFarolDesc = 'Nível de exaustão moderado identificado. Recomenda-se balancear prazos e realizar ações de acolhimento preventivas.';
                $wellnessClass = "color-yellow";
            } else {
                $classFarol = 'red';
                $classFarolLabel = 'Farol Coletivo: Vermelho';
                $classFarolDesc = 'Alerta crítico de esgotamento escolar. A coordenação e os professores devem intervir para ajustar a sobrecarga discente.';
                $wellnessClass = "color-red";
            }
            
            $wellnessLabel = "{$wellnessPct}% (Média)";
            
            // 4. Retrieve course-level averages for dynamic graphs
            $courseAverages = StudentSubmission::select('course', DB::raw('ROUND(AVG(score)) as avg_score'))
                ->groupBy('course')
                ->get();
                
            $farolDistribution = [
                'verde' => $verdeCount,
                'amarelo' => $amareloCount,
                'vermelho' => $vermelhoCount
            ];
            
        } else {
            // Default initial dashboard fallback values when no students have answered yet
            $classFarol = 'green';
            $classFarolLabel = 'Sem avaliações';
            $classFarolDesc = 'Nenhum estudante respondeu ao questionário IBEET nesta semana. Divulgue o portal do aluno para iniciar.';
            $wellnessLabel = 'Sem dados';
            $wellnessClass = 'color-teal';
            $criticalLabel = '0 alunos';
            $criticalClass = 'color-green';
            
            $courseAverages = collect();
            $farolDistribution = ['verde' => 0, 'amarelo' => 0, 'vermelho' => 0];
        }

        return view('index', compact(
            'submissions', 
            'totalSubmissions', 
            'classFarol', 
            'classFarolLabel', 
            'classFarolDesc', 
            'wellnessLabel', 
            'wellnessClass', 
            'criticalLabel', 
            'criticalClass',
            'courseAverages',
            'farolDistribution'
        ));
    }

    /**
     * Display the Student App Form (Área do Aluno).
     */
    public function studentForm()
    {
        $questions = Question::orderBy('axis')->orderBy('id')->get();
        return view('responder', compact('questions'));
    }

    /**
     * Handle student wizard submission and store responses in the database.
     */
    public function submitStudentForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|between:10,100',
            'course' => 'required|string|max:255',
            'score' => 'required|integer',
            'farol' => 'required|string|in:Verde,Amarelo,Vermelho',
            'axis_a' => 'required|integer',
            'axis_b' => 'required|integer',
            'axis_c' => 'required|integer',
            'axis_d' => 'required|integer',
        ]);

        $submission = StudentSubmission::create($validated);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Respostas enviadas com sucesso! Seu bem-estar foi registrado.',
                'submission' => $submission
            ]);
        }

        return redirect()->back()->with('success', 'Formulário enviado com sucesso!');
    }

    /**
     * Delete a student submission from the Pedagogical Dashboard.
     */
    public function destroySubmission(Request $request, $id)
    {
        $submission = StudentSubmission::findOrFail($id);
        $submission->delete();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Submissão de aluno excluída com sucesso!'
            ]);
        }

        return redirect()->back()->with('success', 'Submissão de aluno excluída com sucesso!');
    }
}
