<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyEditRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CompanyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('company_index'), 403);
        $companies = Company::all();
        return view('back.companies.index', compact('companies'));
    }

    public function create()
    {
        abort_if(Gate::denies('company_create'), 403);
        return view('back.companies.create');
    }

    public function store(CompanyCreateRequest $request)
    {
        // Las validaciones se realizan en app/Http/Request/UserCreateRequest.php
        $company = Company::create([
            'name' => $request['name'],
            'address' => $request['address'],
        ]);

        return redirect()->back();
    }

    public function show(Company $company) // Model Binding
    {
        abort_if(Gate::denies('company_show'), 403);
        // $company = Company::findOrFail($id);
        return view('back.companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        abort_if(Gate::denies('company_edit'), 403);
        return view('back.companies.edit', compact('company'));
    }

    public function update(CompanyEditRequest $request, Company $company)
    {
        // Las validaciones se realizan en app/Http/Request/UserEditRequest.php
        // $user = User::findOrFail($id);
        $data = $request->all();
        $company->update($data);
        return redirect()->route('companies.show', $company->id)->with('success', 'Empresa actualizada exitosamente.');
    }

    public function destroy(Company $company)
    {
        abort_if(Gate::denies('company_destroy'), 403);
        $company->delete();
        return redirect()->route('companies')->with('success', 'Empresa eliminada correctamente.');
    }
}
