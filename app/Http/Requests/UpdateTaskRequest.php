<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required',
            'status' => 'required|int|in:1,2,3',
        ];
    }

    // Translated validation messages
    public function messages()
    {
        return [
            'title.required' => 'O campo Titulo é obrigatório.',
            'title.max' => 'O campo senha deve ter no máximo :max caracteres.',
            'description.required' => 'O campo Descrição é obrigatório.',
        ];
    }
}
