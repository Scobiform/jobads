<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

use App\Models\Company;

class CompanyController extends Controller
{
    public function create()
    {
        //If guest do nothing
        if (auth()->guest())
        {
            // Cancel request with 403 Statuscode
            abort(403);
        }

        return view('companies.create');
    }

    public function store()
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
        $attributes['logo'] = request()->file('logo')->store('logos');

        Company::create($attributes);

        return redirect('/');
    }
}

?>
