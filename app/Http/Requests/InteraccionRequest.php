<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class InteraccionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "perro_candidato_id" => "required|exists:perros,id",
            "preferencia" => "required|in:aceptado,rechazado",
        ];
    }

    public function messages()
    {
        return [
            'perro_candidato_id.required' => 'El ID del perro candidato es obligatorio.',
            'perro_candidato_id.integer' => 'El ID del perro candidato debe ser un número entero.',
            'perro_candidato_id.exists' => 'El perro candidato seleccionado no existe.',
            'preferencia.required' => 'La preferencia es obligatoria.',
            'preferencia.in' => 'La preferencia debe ser aceptado o rechazado.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json($validator->errors()->all(), Response::HTTP_BAD_REQUEST)
        );
    }
}
