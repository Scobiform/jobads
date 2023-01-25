@extends('layout')

@section('content')
    <div class="relative flex items-top justify-center min-h-screen-91 bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <article class="marginTopDetail">
            <h1 class="jobDetailh1">
                Manage Companies
            </h1>
            <ul>
            @foreach($companies as $company)
                <li><a href="/company/{{ $company->id }}">{{ $company->name }}</a> - <a href="/company/{{ $company->id }}/edit">Edit</a></li>
            @endforeach
            </ul>
    </div>
@endsection
