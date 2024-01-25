<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployerRegisterController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Foundation\Console\JobMakeCommand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('demo','demo');

Route::get('/',[JobController::class,'index']);
Route::get('/jobs/{id}/{job}',[JobController::class,'show'])->name('jobs.show');
// Route::get('/company/{id}/{company}',[CompanyController::class,'index'])->name('company.index');

//Profile Information
Route::get('user/profile',[UserProfileController::class,'index'])->name('user.profile');
Route::post('user/profile/create',[UserProfileController::class,'profileupdate'])->name('profile.update');
Route::post('user/coverletter',[UserProfileController::class,'coverletter'])->name('cover.letter');
Route::post('user/resume',[UserProfileController::class,'resume'])->name('resume');
Route::post('user/avatar',[UserProfileController::class,'avatar'])->name('profileimage.update');


//employer view
Route::view('employer/register','auth.employer_register')->name('employer.register');
Route::post('employer/register',[EmployerRegisterController::class,'employerRegister'])->name('emp.register');

//This route is when you click the apply form ,this form is not reload  ( use vue )
Route::post('/applications/{id}',[JobController::class,'apply'])->name('apply');

//save and unsave job
Route::post('/save/{id}',[FavouriteController::class,'saveJob']);
Route::post('/unsave/{id}',[FavouriteController::class,'unsaveJob']);

//Search
Route::get('jobs/search',[JobController::class,'searchJobs'])->name('search');

//Company
Route::get('company/{id}/{company}',[CompanyController::class,'index'])->name('company.index');
Route::get('company/create',[CompanyController::class,'create'])->name('company.create');
Route::post('company/create',[CompanyController::class,'store'])->name('company.store');
Route::post('company/coverphoto',[CompanyController::class,'coverPhoto'])->name('cover.photo');
Route::post('company/logo',[CompanyController::class,'companyLogo'])->name('company.logo');

//job
Route::get('jobs/create',[JobController::class,'create'])->name('job.create');
Route::post('jobs/create',[JobController::class,'store'])->name('job.store');
Route::get('jobs/myjob',[JobController::class,'myjob'])->name('job.myjob');
Route::get('jobs/{id}/edit',[JobController::class,'edit'])->name('job.edit');
Route::get('jobs/application',[JobController::class,'applicant'])->name('job.applicant');
Route::get('jobs/alljobs',[JobController::class,'alljobs'])->name('alljobs');


//category
Route::get('category/{id}/jobs',[CategoryController::class,'index'])->name('category.index');


//List all the Companies
Route::get('companies',[CompanyController::class,'company'])->name('company');

//Mail
Route::post('job/email',[MailController::class,'send'])->name('mail');

//admin
Route::get('/dashboard',[AdminController::class,'index']);
Route::get('/dashboard/create',[AdminController::class,'create']);
Route::post('/dashboard/create',[AdminController::class,'store'])->name('admin.store');
Route::get('/dashboard/{id}/edit',[AdminController::class,'edit'])->name('post.edit');
Route::post('/dashboard/{id}/update',[AdminController::class,'update'])->name('post.update');
Route::delete('/dashboard/destroy/{post}', [AdminController::class,'destroy'])->name('dashboard.destroy');

Route::get('/dashboard/trash',[AdminController::class,'trash']);
Route::get('/dashboard/{id}/trash',[AdminController::class,'restore'])->name('post.restore');
Route::get('/dashboard/toggle/{post}',[AdminController::class,'toggle'])->name('post.toggle');
Route::get('/posts/{id}/{slug}',[AdminController::class,'postread'])->name('post.read');
Route::get('/dashboard/jobs',[AdminController::class,'jobs'])->name('dashboard.jobs');
Route::get('/dashboard/{id}/jobs',[AdminController::class,'changeJobStatus'])->name('job.status');

//testimonial
Route::get('/testiomonial',[TestimonialController::class,'index']);
Route::get('/testiomonial/create',[TestimonialController::class,'create']);
Route::post('/testimonial/create',[TestimonialController::class,'store'])->name('testimonial.store');

// Auth::routes();

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

