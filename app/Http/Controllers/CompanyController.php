<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\StoreCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CompanyController extends Controller
{
    public function index(): View
    {
        $companies = Company::query()->with('media')->paginate(10);

        return view('companies.index', compact('companies'));
    }

    public function create(): View
    {
        return view('companies.create');
    }

    public function store(StoreCompanyRequest $request): RedirectResponse
    {
        $data = $request->validated();

        DB::transaction(function () use ($data, $request) {
            $company = Company::query()->create($data);

            if ($request->hasFile('logo')) {
                $company->addMedia($request->file('logo'))->toMediaCollection('company_logo');
            }
        });

        return redirect()->route('companies.index');
    }

    public function show(Company $company): View
    {
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company): View
    {
        return view('companies.edit', compact('company'));
    }

    public function update(UpdateCompanyRequest $request, Company $company): RedirectResponse
    {
        $data = $request->validated();

        DB::transaction(function () use ($data, $request, $company) {
            $company->update($data);

            if ($request->hasFile('logo')) {
                $company->clearMediaCollection('company_logo');
                $company->addMedia($request->file('logo'))->toMediaCollection('company_logo');
            }
        });

        return redirect()->route('companies.index');
    }

    public function destroy(Company $company): RedirectResponse
    {
        $company->delete();

        return redirect()->route('companies.index');
    }
}
