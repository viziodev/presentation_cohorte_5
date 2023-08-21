<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CategorieRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "libelle" =>['required',"min:3",'unique:categories,libelle'],
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
     public function failedValidation(Validator $validator)
       {

        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'erreurs de validation',
            'data'      => $validator->errors()
        ]));

    }

     /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'libelle.required'=>'Libelle est obligatoire',
            'libelle.min'=>'Libelle  doit contenir au minimum de :min caractere',
            'libelle.unique'=>'ce libelle existe deja '
        ];
    }
}