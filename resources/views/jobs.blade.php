@extends('layout')

@section('content')
        @foreach ($jobs as $job)
            <article>
                <h1>
                    <a href="/jobs/{{ $job->slug }}">
                        {{$job->title }}
                    </a>
                </h1>

                <div class="metaDetail">
                    By <a href="/users/{{ $job->author->username }}">{{ $job->author->username }}</a> in <a href="/categories/{{ $job->category->slug }}">{{ $job->category->name }}</a>
                </div>

                <div class="jobExcerpt">
                    {{ $job->excerpt }}
                </div>

            </article>
        @endforeach
@endsection
