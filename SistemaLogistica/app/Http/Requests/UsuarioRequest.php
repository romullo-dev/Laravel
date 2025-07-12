<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'nome_usuario' => 'required',
            'user'=>'required|min:6|unique:usuario',
            'senha' => 'required|password|min:6',
            'tipo_usuario'  => 'required',
            'cpf'=> 'required|min:11|unique:usuario',
            'status_funcionario' => 'required',
            'email' => 'required|email|unique:usuario',
            'foto',
        ];
    }
}
