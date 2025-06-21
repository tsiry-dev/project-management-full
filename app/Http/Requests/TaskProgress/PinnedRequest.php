<?php

namespace App\Http\Requests\TaskProgress;

use App\Models\TaskProgress;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PinnedRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => [ 'required'],
            'pinned' => Rule::in([TaskProgress::NOT_PINNED, TaskProgress::PINNED]),
        ];
    }
}
