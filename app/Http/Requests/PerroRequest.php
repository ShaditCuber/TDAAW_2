<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class PerroRequest extends FormRequest
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
            "nombre" => "unique:perros|string",
            "url_foto"=>"unique:perros|string",
            "descripcion"=>"string",
        ];
    }

    public function messages()
    {
        // return [
        //     'required' => 'El campo :attribute es requerido',
        //     'integer' => 'El campo :attribute debe ser un número entero',
        //     'numeric' => 'El campo :attribute debe ser un número',
        //     'exists' => 'El :attribute debe existir en nuestro sistema',
        //     'boolean' => 'El campo :attribute debe ser un valor tipo boolean',
        //     'required_unless' => 'El campo :attribute es requerido condicionalmente',
        //     'required_with_all' => 'El campo :attribute es requerido condicionalmente',
        //     'required_with' => 'El campo :attribute es requerido condicionalmente',
        //     'required_if' => 'El campo :attribute es requerido condicionalmente',
        //     'string' => 'El campo : attribute debe ser de tipo string',
        //     'unique' => 'El campo :attribute debe ser único en nuestro sistema',
        //     'max' => 'El campo :attribute supera el largo máximo permitido',
        //     'array' => 'El campo :attribute debe ser de tipo array'
        // ];
        return [
            'id.required' => 'El ID del perro es obligatorio.',
            'nombre.required' => 'El nombre del perro es obligatorio.',
            'nombre.max' => 'El nombre del perro no puede superar los 50 caracteres.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json($validator->errors()->all(), Response::HTTP_BAD_REQUEST)
        );
    }
}
