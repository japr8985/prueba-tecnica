<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
        $rules = [
            'title' => 'required',
            'description' => 'required|max:255',
            'status' => 'required',
            'due_date' => 'required'
        ];
        return $rules;
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El titulo es requerido',
            'description.required' => 'La descripcion es requerida',
            'status.required' => 'La tarea debe poseer un status',
            'due_date.required' => 'La tarea debe tener una fecha de vencimiento'
        ];
    }
}
