<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;

Route::get('/', function () {
    $instructors = \App\Models\Instructor::where('is_active', true)->get();
    return view('index', compact('instructors'));
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/partnerships', function () {
    return view('partnerships');
});

Route::get('/partnerships/form', function () {
    return view('form1');
});

Route::get('/consultation', function () {
    return view('form2');
});

Route::get('/training', function () {
    return view('form3');
});

Route::get('/mentor-details', function () {
    return view('mentor-details');
});

Route::get('/course-leadership', function () {
    return view('course-leadership');
});

Route::get('/course-operations', function () {
    return view('course-operations');
});

Route::get('/course-teaching', function () {
    return view('course-teaching');
});

use App\Http\Controllers\PublicJobController;

Route::get('/careers', [PublicJobController::class, 'index'])->name('careers.index');
Route::get('/careers/apply/{job_id?}', [PublicJobController::class, 'showApplyForm'])->name('careers.apply');
Route::post('/careers/apply', [PublicJobController::class, 'storeApplication'])->name('careers.store');

// Admin Auth Routes
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\SubmissionController;

use App\Http\Controllers\Admin\JobController;

use App\Http\Controllers\Admin\InstructorController;

use App\Http\Controllers\Admin\JobApplicationController;

// Protected Admin Routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Submissions
    Route::get('/submissions/partnerships', [SubmissionController::class, 'partnerships'])->name('admin.partnerships');
    Route::get('/submissions/consultations', [SubmissionController::class, 'consultations'])->name('admin.consultations');
    Route::get('/submissions/training', [SubmissionController::class, 'trainingApplications'])->name('admin.training_applications');
    Route::get('/submissions/{type}/{id}', [SubmissionController::class, 'show'])->name('admin.submissions.show');

    // Jobs
    Route::resource('jobs', JobController::class)->names('admin.jobs');
    Route::post('/jobs/{job}/toggle-status', [JobController::class, 'toggleStatus'])->name('admin.jobs.toggle-status');

    // Instructors
    Route::resource('instructors', InstructorController::class)->names('admin.instructors');

    // Job Applications
    Route::get('/job-applications', [JobApplicationController::class, 'index'])->name('admin.job_applications.index');
    Route::get('/job-applications/{id}', [JobApplicationController::class, 'show'])->name('admin.job_applications.show');
    Route::get('/job-applications/{id}/resume', [JobApplicationController::class, 'downloadResume'])->name('admin.job_applications.resume');
});
