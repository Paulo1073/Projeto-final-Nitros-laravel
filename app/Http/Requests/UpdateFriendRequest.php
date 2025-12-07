<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFriendRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id|not_in:' . auth()->id(),
            'bio' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Selecione um usuário.',
            'user_id.exists' => 'O usuário selecionado não é válido.',
            'user_id.not_in' => 'Você não pode adicionar a si mesmo.',
            'bio.string' => 'A descrição deve conter texto válido.',
        ];
    }
}
