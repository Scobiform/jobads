@extends('layout')

@section('content')
    <div class="relative flex items-top justify-center min-h-screen-91 bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <article class="marginTopDetail">
            <h1 class="jobDetailh1">
                Edit Company: {{$company->name}}
            </h1>
            <div class="jobsForm">
                <form method="POST" action="/companies/{{ $company->id }}/edit" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <label for="name">Company name</label>
                    <input type="text" name="name" id="name" value="{{ $company->name }}" required>

                    <label for="contactperson">Contact person</label>
                    <input type="text" name="contactperson" id="contactperson" value="{{ $company->contactperson }}"required>

                    <label for="streat">Street</label>
                    <input type="text" name="street" id="street" value="{{ $company->street }}" required>

                    <label for="postalcode">Postal code</label>
                    <input type="text" name="postalcode" id="postalcode" value="{{ $company->postalcode }}" required>

                    <label for="city">City</label>
                    <input type="text" name="city" id="city" value="{{ $company->city }}"required>

                    <label for="logo">Logo</label>
                    <input type="file" name="logo" id="logo" value="{{ $company->logo }}"required>

                    @if ($company->logo == null)

                    @else
                    <div class="jobAdImage">
                        <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}"/>
                    </div>
                    @endif

                    @error('logo')
                        <p>{{ $message}}</p>
                    @enderror

                    <label for="infotext">Info text</label>
                    <textarea class="bodyText" type="text" name="infotext" id="infotext" required>{{ $company->infotext }}</textarea>

                    <label for="website_url">Website URL</label>
                    <input type="text" name="website_url" id="website_url" value="{{ $company->website_url }}" required>

                    <button type="submit">Update</button>
                </form>
            </div>
        </article>
    </div>
@endsection
