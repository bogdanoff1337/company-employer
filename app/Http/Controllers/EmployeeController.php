<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Http\Requests\Employer\StoreEmployerRequest;
use App\Http\Requests\Employer\UpdateEmployerRequest;
use App\Models\Company;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees = Employer::query()->paginate(10);

        return view('employees.index', compact('employees'));
    }

    public function create(): View
    {
        $companies = Company::all();

        return view('employees.create', compact('companies'));
    }

    public function store(StoreEmployerRequest $request): RedirectResponse
    {
        Employer::query()->create($request->validated());

        return redirect()->route('employees.index');
    }

    public function show(Employer $employer): View
    {
        $employer->with('company');

        return view('employees.show', compact('employer'));
    }

    public function edit(Employer $employer): View
    {
        $companies = Company::all();

        $employer->with('company');

        return view('employees.edit', compact(['employer', 'companies']));
    }

    public function update(UpdateEmployerRequest $request, Employer $employer): RedirectResponse
    {
        $employer->update($request->validated());

        return redirect()->route('employees.index');
    }

    public function destroy(Employer $employer): RedirectResponse
    {
        $employer->delete();

        return redirect()->route('employees.index');
    }
}
