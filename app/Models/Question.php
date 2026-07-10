<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'text',
        'axis',
        'axis_label',
    ];

    /**
     * Get the descriptive label for an axis letter.
     *
     * @param string $axis
     * @return string
     */
    public static function getLabelForAxis(string $axis): string
    {
        $axis = strtoupper($axis);
        $labels = [
            'A' => 'Eixo A: Bem-Estar Cognitivo e Físico',
            'B' => 'Eixo B: Equilíbrio entre Estudo e Rotina',
            'C' => 'Eixo C: Clima Organizacional e Social',
            'D' => 'Eixo D: Suporte Institucional',
        ];

        return $labels[$axis] ?? 'Eixo Geral';
    }
}
