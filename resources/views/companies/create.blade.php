@extends('layout')

@section('content')
    <div class="relative flex items-top justify-center min-h-screen-91 bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <article class="marginTopDetail">
            <h1 class="jobDetailh1">
                Create new company
            </h1>
            <div class="jobsForm">
                <form method="POST" action="/companies" enctype="multipart/form-data">
                    @csrf

                    <label for="name">Company name</label>
                    <input type="text" name="name" id="name" required>

                    <label for="contactperson">Contact person</label>
                    <input type="text" name="contactperson" id="contactperson" required>

                    <label for="streat">Street</label>
                    <input type="text" name="street" id="street" required>

                    <label for="postalcode">Postal code</label>
                    <input type="text" name="postalcode" id="postalcode" required>

                    <label for="city">City</label>
                    <input type="text" name="city" id="city" required>

                    <label for="logo">Logo</label>
                    <input type="file" name="logo" id="logo" required>

                    @error('logo')
                        <p>{{ $message}}</p>
                    @enderror

                    <label for="infotext">Info text</label>
                    <textarea class="bodyText" type="text" name="infotext" id="infotext" required> </textarea>

                    <label for="website_url">Website URL</label>
                    <input type="text" name="website_url" id="website_url" required>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </article>
    </div>
@endsection
