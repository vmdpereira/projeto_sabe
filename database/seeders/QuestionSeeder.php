<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            // Eixo A: Bem-Estar Cognitivo e Físico
            [
                'text' => 'Consigo me concentrar nas aulas e nos estudos.',
                'axis' => 'A',
                'axis_label' => Question::getLabelForAxis('A'),
            ],
            [
                'text' => 'Tenho dormido bem e me sinto descansado(a) ao acordar.',
                'axis' => 'A',
                'axis_label' => Question::getLabelForAxis('A'),
            ],
            [
                'text' => 'Sinto-me emocionalmente equilibrado(a) para lidar com a rotina escolar.',
                'axis' => 'A',
                'axis_label' => Question::getLabelForAxis('A'),
            ],
            [
                'text' => 'Consigo gerenciar o estresse das provas e entregas de trabalhos.',
                'axis' => 'A',
                'axis_label' => Question::getLabelForAxis('A'),
            ],

            // Eixo B: Equilíbrio entre Estudo e Rotina
            [
                'text' => 'Consigo conciliar os estudos na Etec com meu trabalho, estágio ou busca por emprego.',
                'axis' => 'B',
                'axis_label' => Question::getLabelForAxis('B'),
            ],
            [
                'text' => 'Tenho tempo suficiente para realizar minhas atividades de lazer e vida social.',
                'axis' => 'B',
                'axis_label' => Question::getLabelForAxis('B'),
            ],
            [
                'text' => 'Consigo dar atenção às minhas responsabilidades familiares sem prejudicar os estudos.',
                'axis' => 'B',
                'axis_label' => Question::getLabelForAxis('B'),
            ],
            [
                'text' => 'Sinto que minha rotina semanal é equilibrada e saudável.',
                'axis' => 'B',
                'axis_label' => Question::getLabelForAxis('B'),
            ],

            // Eixo C: Clima Organizacional e Social
            [
                'text' => 'Sinto-me acolhido(a) e respeitado(a) pelos meus colegas de classe.',
                'axis' => 'C',
                'axis_label' => Question::getLabelForAxis('C'),
            ],
            [
                'text' => 'Tenho um bom relacionamento com os professores da instituição.',
                'axis' => 'C',
                'axis_label' => Question::getLabelForAxis('C'),
            ],
            [
                'text' => 'Considero o ambiente da escola agradável e propício para o aprendizado.',
                'axis' => 'C',
                'axis_label' => Question::getLabelForAxis('C'),
            ],
            [
                'text' => 'Sinto-me integrado(a) e parte da comunidade escolar.',
                'axis' => 'C',
                'axis_label' => Question::getLabelForAxis('C'),
            ],

            // Eixo D: Suporte Institucional
            [
                'text' => 'Sei a quem recorrer na escola se estiver passando por dificuldades pessoais ou acadêmicas.',
                'axis' => 'D',
                'axis_label' => Question::getLabelForAxis('D'),
            ],
            [
                'text' => 'Sinto que a escola se preocupa de verdade com o bem-estar dos estudantes.',
                'axis' => 'D',
                'axis_label' => Question::getLabelForAxis('D'),
            ],
        ];

        foreach ($questions as $q) {
            Question::create($q);
        }
    }
}
