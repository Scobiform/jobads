<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

use App\Models\Company;
use App\Models\User;

class EditCompanyController extends Controller
{
    public function index()
    {
        // Only show jobs that belong to the user
        $companies = Company::where('user_id', auth()->id())->get();

        // If guest do nothing
        if (auth()->guest())
        {
            // Cancel request with 403 Statuscode
            abort(403);
        }

        return view('companies.index', [
            'companies' => $companies
        ]);
    }

    public function edit(Company $company)
    {
        return view('companies.edit', ['company' => $company]);
    }

    public function update(Company $company)
    {
        // Validate the request
        $attributes = request()->validate([
            'name' => 'required',
            'contactperson' => 'required',
            'street' => 'required',
            'postalcode' => 'required',
            'city' => 'required',
            'infotext' => 'required',
            'logo' => 'image',
            'website_url' => 'required',
        ]);

        $attributes['user_id'] = auth()->id();

        if (isset($attributes['logo']))
        {
            $attributes['logo'] = request()->file('logo')->store('logos');
        }

        $company->update($attributes);

        return back()->with('success', 'Company updated');
    }
}
