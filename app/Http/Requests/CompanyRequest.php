<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
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
}
