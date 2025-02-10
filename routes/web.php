<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HrController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\UserPageController;
Route::get('/', [UserPageController::class, 'welcome'])->name('home');
 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//page project
Route::controller(UserPageController::class)->group(function () {
    Route::get('/jobs' ,'jobs_page')->name('jobspage');
    Route::get('/show_single_job/{id}' ,'show_single_job')->name('show_single_job');
    Route::get('/Featured_job' ,'Featured_job_page')->name('Featured_job_page');
    Route::get('/blog' ,'blog_page')->name('blog_page');
    Route::get('/single_blog/{id}' ,'single_blog')->name('single_blog');
    Route::post('/save_comment/{id}' ,'save_comment')->name('save_comment');
    Route::get('/contact' ,'contact_page')->name('contact_page');
    Route::get('/about_page' ,'about_page')->name('about_page');
    Route::get('/internship' ,'internship_page')->name('internship_page');
    Route::get('/search_job' ,'search_job')->name('search_job');
    Route::get('/search_section/{section_id}' ,'search_section')->name('search_section');
    Route::get('/job/{job_name}/{country}/{section_id}' ,'job')->name('job');
});
//cv
Route::get('/cv', [UserPageController::class, 'cv_page'])->name('cv_page');
Route::post('/cv_generate', [ImageController::class, 'generateCV'])->name('cv_generate');
//login page
Route::get('/login_user', [UserPageController::class, 'login_user'])->name('login_user');
Route::get('/login_clint', [UserPageController::class, 'login_clint'])->name('login_clint');
Route::get('/view_profile_user/{id}', [UserPageController::class, 'view_profile_user'])->name('view_profile_user');
Route::get('/edit_profile_user', [UserPageController::class, 'edit_profile_user'])->name('edit_profile_user');

Route::get('/job_details/{id}', [JobController::class, 'job_details_page'])->name('job_details_page');
Route::get('/form_job/{id}', [JobController::class, 'form_job'])->name('form_job');
Route::post('/save_request_job', [JobController::class, 'save_request_job'])->name('save_request_job');
//login whit google
Route::get('auth/google', [GoogleController::class, 'googlepage'])->name('googlepage');
Route::get('/auth/google/callback', [GoogleController::class, 'googlecallback'])->name('googlecallback');
//login with github
Route::get('github', [GithubController::class, 'githubpage'])->name('githubpage');
Route::get('/github/redirect', [GithubController::class, 'githubcallback'])->name('socialite.redirect');
//contact
Route::post('/save_contact', [ContactController::class, 'save_contact'])->name('save_contact');
//hr route
Route::get('/Job_management', [HrController::class, 'Job_management_page'])->name('Job_management_page');
Route::get('/Job_Details/{id}', [HrController::class, 'Job_Details'])->name('Job_Details');
Route::get('/show_request/{id}', [HrController::class, 'show_request'])->name('show_request');
Route::get('/Stop_show_job/{id}', [HrController::class, 'Stop_show_job'])->name('Stop_show_job');
Route::get('/show_it/{id}', [HrController::class, 'show_it'])->name('show_it');
Route::get('/login_hr', [HrController::class, 'login_hr'])->name('login_hr');
Route::get('/create_job', [HrController::class, 'hr_index_page'])->name('create_job');
Route::get('/view_profile_hr', [HrController::class, 'view_profile'])->name('view_profile_hr');

 

//admin

Route::middleware(['check_admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin_index');
    Route::get('/section', [AdminController::class, 'section_index'])->name('section_index');
    Route::get('/jobs_index', [AdminController::class, 'jobs_index'])->name('jobs_index');
    Route::get('/show_question/{id}', [AdminController::class, 'show_question'])->name('show_question');
    Route::get('/user_index', [AdminController::class, 'user_index'])->name('user_index');
    Route::get('/hr_index', [AdminController::class, 'hr_index'])->name('hr_index');
    Route::get('/blog_index', [AdminController::class, 'blog_index'])->name('blog_index');
    Route::get('/show_comment/{id}', [AdminController::class, 'show_comment'])->name('show_comment');
    Route::get('/Customer_Messages', [AdminController::class, 'Customer_Messages_index'])->name('Customer_Messages_index');
    Route::delete('/Customer_Message/destroy/{id}', [AdminController::class, 'delete'])->name('Customer_Message.destroy');
    Route::delete('/comment/destroy/{id}', [AdminController::class, 'delete_comment'])->name('comment.destroy');
});


require __DIR__.'/auth.php';
