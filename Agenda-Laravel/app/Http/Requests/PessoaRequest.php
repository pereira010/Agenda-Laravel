<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|string|max:100|min:0',
            'sobre_nome' => 'required|string|max:100|min:0',
            'telefone' => 'required|integer',
            'apelido' => 'max:100|min:0',
            'data_nascimento' => 'required|date|max:15'
        ];
    }
}
