<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class CandidatoRequest extends FormRequest
{   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "perro_interesado_id" => "required|exists:perros,id",
        ];
    }

    public function messages()
    {
        return [
            'perro_interesado_id.required' => 'El ID del perro interesado es obligatorio.',
            'perro_interesado_id.integer' => 'El ID del perro interesado debe ser un número entero.',
            'perro_interesado_id.exists' => 'El perro interesado seleccionado no existe.',
        ];
    }
    

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json($validator->errors()->all(), Response::HTTP_BAD_REQUEST)
        );
    }
}
