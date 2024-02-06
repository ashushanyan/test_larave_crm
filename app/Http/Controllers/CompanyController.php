<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\StoreRequest;
use App\Http\Requests\Company\UpdateRequest;
use App\Http\Services\CompanyService;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CompanyController extends Controller
{
    private CompanyService $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index(): View
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    public function create(): View
    {
        return view('companies.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $this->companyService->store($request);
        return redirect()->route('companies.index')->with('success', 'Company created successfully');
    }

    public function show($id): View
    {
        $company = Company::findOrFail($id);

        return view('companies.show', compact('company'));
    }

    public function edit($id): View
    {
        $company = Company::findOrFail($id);

        return view('companies.edit', compact('company'));
    }

    public function update(UpdateRequest $request, $id): RedirectResponse
    {
        $company = Company::findOrFail($id);
        $company->name = $request['name'];
        $company->email = $request['email'];
        $company->web_page_url = $request['web_page_url'];

        if ($request->hasFile('logo')) {
            if ($company->logo_path) {
                Storage::disk('public')->delete($company->logo_path);
            }
            $logoPath = $request->file('logo')->store('logos', 'public');
            $company->logo_path = $logoPath;
        }
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully');
    }
}
