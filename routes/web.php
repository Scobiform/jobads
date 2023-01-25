<?php

use App\Models\Job;
use App\Models\Company;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EditJobController;
use App\Http\Controllers\EditCompanyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Startpage
Route::get('/', function () {

    /*
    // SQL Logger
    \Illuminate\Support\Facades\DB::listen(function ($query) {
        logger($query->sql, $query->bindings);
    });
    */

    // Get all Jobs with category
    return view('jobs', [
        'jobs' => Job::latest()->with('category', 'author')->get()
    ]);
});

// Jobs
Route::get('jobs/{job:slug}', function (Job $job) {
    return view('job', [
        'job' => $job
    ]);
});

// Categories
Route::get('categories/{category:slug}', function (\App\Models\Category $category) {
    return view('jobs', [
        'jobs' => $category->jobs
    ]);
});

// Users
Route::get('users/{author:username}', function (\App\Models\User $author) {
    return view('jobs', [
        'jobs' => $author->jobs->load('category', 'author')
    ]);
});

// Jobs -- JobController -- EditJobController
Route::get('job/create', [JobController::class, 'create']);
Route::post('jobs', [JobController::class, 'store']);
Route::get('job/edit', [EditJobController::class, 'index']);
Route::get('jobs/{job:slug}/edit', [EditJobController::class, 'edit']);
Route::patch('job/{job:slug}/edit', [EditJobController::class, 'update']);

// Company -- CompanyController
Route::get('company/create', [CompanyController::class, 'create']);
Route::post('companies', [CompanyController::class, 'store']);
Route::get('company/edit', [EditCompanyController::class, 'index']);
Route::get('company/{company:id}/edit', [EditCompanyController::class, 'edit']);
Route::patch('companies/{company:id}/edit', [EditCompanyController::class, 'update']);


// Register -- RegisterController
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

// Login -- LoginController
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Admin -- AdminController

?>
