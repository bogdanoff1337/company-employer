<?php

namespace App\Http\Requests\Employer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_id' => 'nullable|integer|exists:companies,id',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Ім\'я є обов\'язковим.',
            'last_name.required' => 'Прізвище є обов\'язковим.',
            'company_id.exists' => 'Вибрана компанія не існує.',
            'email.email' => 'Email має бути дійсною адресою електронної пошти.',
        ];
    }
}
