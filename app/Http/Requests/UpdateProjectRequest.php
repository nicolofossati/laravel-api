<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:150', Rule::unique('projects')->ignore($this->project)],
            'description' => "required|max:65000",
            'creation_date' => "required|max:30",
            'completion_date' => "required|max:30",
            'client' => "required|max:50",
            'category' => "required|max:50",
            'type_id' => "nullable|exists:types,id",
            'technologies' => "exists:technologies,id"
        ];
    }
}