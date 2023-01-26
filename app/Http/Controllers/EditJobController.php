<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

use App\Models\Job;
use App\Models\User;

class EditJobController extends Controller
{
    public function index()
    {
        // Only show jobs that belong to the user
        $jobs = Job::where('user_id', auth()->id())->get();

        // If guest do nothing
        if (auth()->guest())
        {
            // Cancel request with 403 Statuscode
            abort(403);
        }

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        // Validate the request
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'slug' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'company_id' => 'required',
            'category_id' => 'required'
        ]);

        // TODO: Write regex rule for slug / shorturls

        $attributes['user_id'] = auth()->id();

        if (isset($attributes['thumbnail']))
        {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $job->update($attributes);

        return back()->with('success', 'Job updated');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return back()->with('success', 'Job Deleted');
    }
}
