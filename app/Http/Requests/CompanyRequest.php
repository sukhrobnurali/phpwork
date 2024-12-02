<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'logo' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'website_url' => 'nullable|url',
            'hh_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Kompaniya nomi majburiy.',
            'category_id.required' => 'Kategoriya tanlanishi shart.',
            'category_id.exists' => 'Tanlangan kategoriya mavjud emas.',
            'logo.mimes' => 'Logotip faqat JPG, JPEG, PNG yoki SVG formatida bo‘lishi kerak.',
            'logo.max' => 'Logotip fayli hajmi 2MB dan oshmasligi kerak.',
        ];
    }
}
