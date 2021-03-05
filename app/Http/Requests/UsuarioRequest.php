<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'nome'=>'required',
            'email'=>'required|email:rfc,dns',
            'senha'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'nome.required'=>'O campo Nome deve ser preenchido.',
            'email.required'=>'O campo Email deve ser preenchido.',
            'email.email'=>'Preencha com um Email válido.',
            'senha.required'=>'O campo Senha deve ser preenchido.'
            
        ];
    }
}
