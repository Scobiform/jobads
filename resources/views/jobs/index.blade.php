@extends('layout')

@section('content')
    <div class="relative flex items-top justify-center min-h-screen-91 bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <article class="marginTopDetail">
            <h1 class="jobDetailh1">
                Manage Job offers
            </h1>

            <ul>
            @foreach($jobs as $job)
                <li><a href="/jobs/{{ $job->slug }}">{{ $job->title }}</a> - <a href="/jobs/{{ $job->slug }}/edit">Edit</a></li>
            @endforeach
            </ul>

    </div>
@endsection
