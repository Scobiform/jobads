@extends('layout')

@section('content')
    <div class="relative flex items-top justify-center min-h-screen-91 bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <article class="marginTopDetail">
            <h1 class="jobDetailh1">
                Create new Job offer
            </h1>
            <div class="jobsForm">
                <form method="POST" action="/jobs" enctype="multipart/form-data">
                    @csrf

                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" required>

                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" required>

                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail" required>

                    @error('thumbnail')
                        <p>{{ $message}}</p>
                    @enderror

                    <label for="body">Body (HTML)</label>
                    <textarea class="bodyText" type="text" name="body" id="body" required> </textarea>

                    <label for="excerpt">Excerpt</label>
                    <textarea type="text" name="excerpt" id="excerpt" required> </textarea>

                    <label for="company">Company</label>
                    <select name="company_id" id="company_id">
                        @foreach (\App\Models\Company::all(); as $company)
                            <option value="{{ $company->id }}">{{ ucwords($company->name) }}</option>
                        @endforeach
                    </select>

                    <label for="category">Category</label>
                    <select name="category_id" id="category_id">
                        @foreach (\App\Models\Category::all(); as $category)
                            <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </article>
    </div>
@endsection
