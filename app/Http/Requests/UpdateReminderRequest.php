<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReminderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo' => 'nullable|string|max:255',
            'descricao' => 'required|string',
            'game_id' => 'required|exists:games,id',
            'concluido' => 'sometimes|boolean',
        ];
    }

    public function messages()
    {
        return [
            'titulo.string' => 'O título deve ser um texto válido.',
            'titulo.max' => 'O título não pode ultrapassar 255 caracteres.',
            'descricao.required' => 'A descrição é obrigatória.',
            'descricao.string' => 'A descrição deve ser um texto válido.',
            'game_id.required' => 'Selecione um jogo.',
            'game_id.exists' => 'O jogo selecionado não é válido.',
            'concluido.boolean' => 'O campo concluído deve ser verdadeiro ou falso.',
        ];
    }
}
