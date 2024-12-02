<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    public function companyRequests(CompanyRequest $request)
    {
        $validatedData = $request->validated();
        $logoPath = $this->uploadLogo($request);
        $dataToSave = array_merge($validatedData, ['logo' => $logoPath]);
        Company::create($dataToSave);
        return redirect()->back()->with('success', "Korxona qo’shish so’rovingiz muvaffaqiyatli qabul qilindi!");
    }

    private function uploadLogo(Request $request): ?string
    {
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            if (!$file->isValid() || !$file->getMimeType() || !str_starts_with($file->getMimeType(), 'image/')) {
                abort(400, "Logotip uchun faqat rasm formatlari qabul qilinadi.");
            }
            return $file->store('logos', 'public');
        }
        return null;
    }

}
