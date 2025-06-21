<?php

namespace App\Http\Requests\Tasks;

use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskUpdateStatusRequest extends FormRequest
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
              'id' => [
                'required',
                'integer',
                 Rule::exists('tasks', 'id')
              ]
        ];
    }

    public function messages(): array
    {
         return [
              'id.exists' => 'La tache que vous modifier n\'existe pas',
              'id.integer' => 'La tache doit être un numéro',
              'id.required' => 'la tache est obligatoire'
         ];
    }
}
