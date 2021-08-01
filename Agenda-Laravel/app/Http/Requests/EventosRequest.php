<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventosRequest extends FormRequest
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
            'nome' => 'required|max:255|string',
            'descricao' => 'required|max:255|string',
            'hora_evento' => 'required|date',
            'id_endereco' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'id_endereco.required' => 'O campo de endereço é requerido'
        ];
    }
}
