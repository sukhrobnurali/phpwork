<?php

declare(strict_types=1);

namespace App\Http\Requests\CompanyRequest;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationForCompanyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'web_site_url' => ['required', 'string'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'desc' => ['required', 'string'],
        ];
    }

    public function getCategoryId(): int
    {
        return (int) $this->input('category_id');
    }
}
