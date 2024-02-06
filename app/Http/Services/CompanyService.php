<?php

namespace App\Http\Services;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyService
{
    public function store(Request $request): Company
    {
        $logoPath = $this->uploadLogo($request);

        $company = new Company([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'logo_path' => $logoPath,
            'web_page_url' => $request->input('web_page_url'),
        ]);

        $company->save();

        return $company;
    }

    private function uploadLogo(Request $request): bool|string|null
    {
        if ($request->hasFile('logo')) {
            return $request->file('logo')->store('logos', 'public');
        }

        return null;
    }
}
