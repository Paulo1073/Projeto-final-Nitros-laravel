<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSpeedrunRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'game_id' => 'required|exists:games,id',
            'time' => 'required|string',
            'date' => 'required|date',
            'mode' => 'required|string|max:50',
        ];
    }

    public function messages()
    {
        return [
            'game_id.required' => 'O campo jogo é obrigatório.',
            'game_id.exists' => 'O jogo selecionado é inválido.',
            'time.required' => 'O tempo da speedrun é obrigatório.',
            'date.required' => 'A data da speedrun é obrigatória.',
            'date.date' => 'A data fornecida é inválida.',
            'mode.required' => 'O modo de jogo é obrigatório.',
            'mode.max' => 'O modo de jogo não pode ter mais que 50 caracteres.',
        ];
    }
}
