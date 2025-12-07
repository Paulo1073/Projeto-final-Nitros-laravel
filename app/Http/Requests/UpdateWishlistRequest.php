<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWishlistRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'   => 'required|string|max:255',
            'image'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date'   => 'nullable|date',
            'status' => 'required|in:desired,purchased',
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'O nome é obrigatório.',
            'name.string'    => 'O nome deve ser um texto válido.',
            'name.max'       => 'O nome não pode ter mais que 255 caracteres.',

            'image.image'    => 'O arquivo enviado deve ser uma imagem.',
            'image.mimes'    => 'A imagem deve ser dos formatos: jpeg, png, jpg ou gif.',
            'image.max'      => 'A imagem não pode ultrapassar 2MB.',

            'date.date'      => 'A data deve estar em um formato válido (AAAA-MM-DD).',

            'status.required' => 'O status é obrigatório.',
            'status.in'       => 'O status selecionado é inválido.',
        ];
    }
}
