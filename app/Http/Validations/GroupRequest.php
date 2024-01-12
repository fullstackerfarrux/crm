<?php

namespace App\Http\Validations;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
            'group_stack' => 'required|string',
            'group_day' => 'required|string',
            'group_time' => 'required|string',
            'teacher_phone' => 'required|regex:/^\+998\d{9}$/'
        ];
    }
}
