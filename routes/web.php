<?php

use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\Job\AppliedJobController;
use App\Http\Controllers\Job\DashboardController as JobDashboardController;
use App\Http\Controllers\Job\JobsController;

use App\Http\Controllers\Job\LoginController as JobLoginController;
use App\Http\Controllers\Job\ProfileController;
use App\Http\Controllers\Job\RegisterController as JobRegisterController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ProfileController as ControllersProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [JobController::class, 'index'])->name('dashboard');
Route::get('/job/{id}', [JobController::class, 'show'])->name('dashboard.show');


Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

//Student
Route::get('student/login',[loginController::class,'create'])->name('login');
Route::post('student/login',[loginController::class,'login']);
Route::get('register',[RegisterController::class,'create'])->name('register');
Route::post('register',[RegisterController::class,'store'])->name('register.store');
Route::post('student/logout', [loginController::class, 'logout'])->name('logout');


Route::middleware('auth:student')->group(function () {
Route::post('/jobs/apply/{jobId}', [DashboardController::class, 'apply'])->name('job.apply');
Route::get('student/dashboard', [DashboardController::class, 'index'])->name('student.dashboard');
Route::get('listedjobs/job', [DashboardController::class, 'ListedJobs'])->name('student.jobs');
Route::get('show/job/{id}', [DashboardController::class, 'show'])->name('student.show');
Route::get('/student/applied-jobs', [DashboardController::class, 'appliedJobs'])->name('student.applied.jobs');
Route::get('student/profile/{id}',[ControllersProfileController::class,'index'])->name('student.profile');
Route::post('student/store', [ControllersProfileController::class, 'store'])->name('student.store');
});

//Admin
Route::get('admin/login',[AdminLoginController::class,'create'])->name('admin.login');
Route::post('admin/login',[AdminLoginController::class,'login']);
Route::middleware('auth:web')->group(function(){
Route::get('admin/dashboard',[AdminDashboardController::class,'index'])->name('admin.index');
Route::get('admin/jobs',[AdminDashboardController::class,'jobs'])->name('admin.jobs');
Route::get('admin/student',[AdminDashboardController::class,'student'])->name('admin.student');
Route::get('admin/company',[AdminDashboardController::class,'company'])->name('admin.company');
Route::get('company/profile/{id}',[AdminProfileController::class,'index'])->name('job.profile');
Route::post('company/store', [AdminProfileController::class, 'store'])->name('company.store');
Route::post('admin/logout',[AdminLoginController::class,'logout'])->name('admin.logout');
});

Route::get('share/{id}', [JobDashboardController::class, 'share'])->name('jobs.share');

//Job
Route::get('company/login',[JobLoginController::class,'create'])->name('company.login');
Route::post('company/login',[JobLoginController::class,'login']);
Route::get('company/register',[JobRegisterController::class,'create'])->name('company');
Route::post('company/register',[JobRegisterController::class,'store'])->name('company.store');
Route::post('logout', [JobLoginController::class, 'logout'])->name('company.logout');
Route::middleware('auth:company')->group(function(){
Route::get('company/dashboard',[JobDashboardController::class,'index'])->name('company.dashboard');
Route::resource('jobs',JobsController::class);
Route::get('applied/job',[AppliedJobController::class,'index'])->name('applied.job');
Route::get('/company/job/{job}/student/{student}',[AppliedJobController::class,'show'])->name('applied.job.show');

Route::put('/company/job/{job}/student/{student}', [AppliedJobController::class, 'update'])->name('applied.job.update');
Route::get('/company/job/{job}/student/{student}/edit', [AppliedJobController::class, 'edit'])->name('applied.job.edit');
Route::get('company/profile/{id}',[ProfileController::class,'index'])->name('job.profile');
Route::post('company/store', [ProfileController::class, 'store'])->name('company.store');
});
Route::get('/interview/{job}/{student}', [InterviewController::class, 'show'])
     ->name('interview.details');
