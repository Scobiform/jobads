<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        return view('jobs.Index', [
            'jobs' => Job::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(18)->withQueryString()
        ]);
    }

    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    public function create()
    {
        //If guest do nothing
        if (auth()->guest())
        {
            // Cancel request with 403 Statuscode
            abort(403);
        }

        return view('jobs.create');
    }

    public function store()
    {
        // Validate the request
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => 'required', Rule::unique('jobs', 'slug'),
            'excerpt' => 'required',
            'body' => 'required',
            'company_id' => 'required', Rule::exists('company', 'id'),
            'category_id' => 'required', Rule::exists('categories', 'id')
        ]);

        // TODO: Write regex rule for slug / shorturls

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Job::create($attributes);

        return redirect('/');
    }
}

?>
