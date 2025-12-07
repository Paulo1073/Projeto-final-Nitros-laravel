<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGameRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255',
            'genero' => 'required|string|max:100',
            'descricao' => 'required|string',
            'plataforma' => 'required|string|max:100',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'O campo título é obrigatório.',
            'genero.required' => 'O campo gênero é obrigatório.',
            'descricao.required' => 'A descrição é obrigatória.',
            'plataforma.required' => 'A plataforma é obrigatória.',

            'imagem.image' => 'O arquivo deve ser uma imagem válida.',
            'imagem.mimes' => 'A imagem deve ser JPEG, PNG, JPG ou GIF.',
            'imagem.max'   => 'A imagem não pode ter mais que 2MB.',
        ];
    }
}
