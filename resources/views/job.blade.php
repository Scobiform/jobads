@extends('layout')

@section('content')
        <article class="marginTopDetail">
            <h1 class="jobDetailh1">
                <a href="/jobs/{{ $job->slug }}">
                    {{$job->title }}
                </a>
            </h1>

            @if ($job->thumbnail == null)

            @else
            <div class="jobAdImage">
                <img src="{{ asset('storage/' . $job->thumbnail) }}" alt="{{ $job->title}}"/>
            </div>
            @endif

            <div class="metaDetail">
                By <a href="/users/{{ $job->author->username }}">{{ $job->author->username }}</a> in <a href="/categories/{{ $job->category->slug }}">{{ $job->category->name }}</a><br />
                Published <time>{{$job->created_at }}</time>
            </div>

            <div class="jobDetail">
                {!!$job->body !!}
            </div>

        </article>
@endsection
