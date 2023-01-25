@extends('layout')

@section('content')
    <div class="relative flex items-top justify-center min-h-screen-91 bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <article class="marginTopDetail">
            <h1 class="jobDetailh1">
                Edit job offer
            </h1>
            <div class="jobsForm">
                <form method="POST" action="/job/{{ $job->slug }}/edit" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ $job->title }}" required>

                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ $job->slug }}" required>

                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail" value="{{ $job->thumbnail }}" required>

                    @if ($job->thumbnail == null)

                    @else
                    <div class="jobAdImage">
                        <img src="{{ asset('storage/' . $job->thumbnail) }}" alt="{{ $job->title}}"/>
                    </div>
                    @endif

                    @error('thumbnail')
                        <p>{{ $message}}</p>
                    @enderror

                    <label for="body">Job description</label>
                    <textarea class="bodyText" type="text" name="body" id="body" required>{{ $job->body }}</textarea>

                    <label for="excerpt">Excerpt</label>
                    <textarea type="text" name="excerpt" id="excerpt" required>{{ $job->excerpt }}</textarea>

                    <label for="company">Company</label>
                    <select name="company_id" id="company_id" value="{{ $job->company_id }}">
                        @foreach (\App\Models\Company::all(); as $company)
                            <option value="{{ $company->id }}"{{ $job->company_id == $company->id ? 'selected' : '' }}>
                                {{ ucwords($company->name) }}
                            </option>
                        @endforeach
                    </select>

                    <label for="category">Category</label>
                    <select name="category_id" id="category_id">
                        @foreach (\App\Models\Category::all(); as $category)
                            <option value="{{ $category->id }}"{{ $job->category_id == $category->id ? 'selected' : '' }}>
                                {{ ucwords($category->name) }}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit">Update</button>
                </form>
            </div>
        </article>
    </div>
@endsection
