<?php

namespace App\Http\Requests\Tasks;

use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'project_id' => [
                'required',
                'integer',
                 Rule::exists('projects', 'id')
            ],
            'status' => [
                Rule::in([
                    Task::NOT_STARTED,
                    Task::PENDING,
                    Task::COMPLETED
                ])
            ],
            'member_ids' => ['required', 'array'],
            'member_ids.*' => [
                'numeric',
                'distinct',
                Rule::exists('members', 'id')
            ],
        ];
    }

    public function messages(): array
    {
         return [
             'name.required' => 'Le nom est obligatoire',
             'project_id.exists' => 'Le projet que vous ajouter n\'existe pas',
             'member_ids.*.exists' => 'Le membre que vous ajouter n\'existe pas',
             'status.in' => 'Le statut doit être un des statuts disponibles (non commencé, en cours, términé)',
             'member_ids.*.numeric' => 'Le membre doit être un numéro',
         ];
    }
}
