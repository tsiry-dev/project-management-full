<?php

namespace App\Http\Requests\Projects;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectUpdateRequest extends FormRequest
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
                 Rule::exists('projects', 'id')
            ],
            'status' => Rule::in([
                Project::NOT_STARTED,
                Project::PENDING,
                Project::COMPLETED
            ]),
            'name' => 'required',
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
        ];
    }

    public function messages():array
    {
        return [
            'name.required' => 'Le nom est obligatoire',
            'start_date.required' => 'La date de début est obligatoire',
            'end_date.required' => 'La date de fin est obligatoire',
            'start_date.after' => 'La date de début doit être postérieure à la date de fin',
            'id.exists' => 'Le projet que vous modifier n\'existe pas',
            'status.in' => 'Le statut doit être un des statuts disponibles (0, 1, 2)',
        ];
    }
}
