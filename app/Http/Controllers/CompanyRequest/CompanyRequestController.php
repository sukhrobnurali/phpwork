<?php

declare(strict_types=1);

namespace App\Http\Controllers\CompanyRequest;

use App\Models\Category;
use App\Models\CompanyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CompanyRequest\ApplicationForCompanyRequest;

class CompanyRequestController extends Controller
{
    public function storeCompanyRequest(ApplicationForCompanyRequest $request): RedirectResponse
    {
        Category::query()->findOrFail($request->getCategoryId());

        $companyRequest = new CompanyRequest;
        $companyRequest->name = $request->input('name');
        $companyRequest->desc = $request->input('desc');
        $companyRequest->web_site_url = $request->input('web_site_url');
        $companyRequest->category_id = $request->getCategoryId();
        $companyRequest->save();

        return redirect()->back();
    }
}
