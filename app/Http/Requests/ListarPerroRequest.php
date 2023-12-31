<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class ListarPerroRequest extends FormRequest
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
            //
            "id" => "exists:perros,id",
            "limit"=>"integer",
            "nombre"=>"string|exists:perros,nombre",
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'El ID del perro es obligatorio.',
            'id.integer' => 'El ID del perro debe ser un número entero.',
            'id.exists' => 'El perro seleccionado no existe.',
            'limit.integer' => 'El limite debe ser un número entero.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json($validator->errors()->all(), Response::HTTP_BAD_REQUEST)
        );
    }
}
