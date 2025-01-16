<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'logo.dimensions' => 'Розміри зображення повинні бути не менше 100x100 пікселів.',
            'name.required' => 'Назва компанії є обов\'язковою.',
            'email.email' => 'Email має бути дійсною адресою електронної пошти.',
            'logo.image' => 'Завантажений файл має бути зображенням.',
            'website.url' => 'Вебсайт має бути дійсним URL.',
        ];
    }
}
