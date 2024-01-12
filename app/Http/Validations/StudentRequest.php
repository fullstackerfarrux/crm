<?php

namespace App\Http\Validations;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'student_name' => "required",
            'parent_name' => "required",
            'stack' => "required",
            'student_phone' => "required|unique:students,student_phone|regex:/^\+998\d{9}$/",
            'parent_phone' => "required|unique:students,parent_phone|regex:/^\+998\d{9}$/",
        ];
    }
}
