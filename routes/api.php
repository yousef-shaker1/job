<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\HrController;
use App\Http\Controllers\api\BlogController;
use App\Http\Controllers\api\JobsController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\UsersController;
use App\Http\Controllers\api\SectionController;
use App\Http\Controllers\api\love_blogController;
use App\Http\Controllers\api\Customer_messagesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::post('auth/google', [UserController::class, 'googlepage']);
Route::get('/auth/google/callback', [UserController::class, 'googlecallback']);

Route::post('github', [UserController::class, 'githubpage']);
Route::get('/github/redirect', [UserController::class, 'githubcallback']);

Route::group(['middleware' => ['jwt.verify']], function() {
    //jwt
    Route::get('profile', [UserController::class,'profile']);
    Route::get('logout', [UserController::class,'logout']);
    Route::post('/refresh', [UserController::class, 'refresh']);
    
    //sections
    Route::get('/sections', [SectionController::class, 'section_all']);
    Route::get('/section/{id}', [SectionController::class, 'show_section']);
    Route::post('/create/section', [SectionController::class, 'create']);
    Route::patch('/edit/section/{id}', [SectionController::class, 'edit']);
    Route::delete('/delete/section/{id}', [SectionController::class, 'delete']);
    
    //blogs
    Route::get('/blogs', [BlogController::class, 'index']);
    Route::get('/blog/{id}', [BlogController::class, 'show_blog']);
    Route::post('/create/blog', [blogController::class, 'create']);
    Route::post('/edit/blog/{id}', [blogController::class, 'edit']);
    Route::delete('/delete/blog/{id}', [blogController::class, 'delete']);
    
    Route::get('/comment_blogs/{id}', [BlogController::class, 'comment_blogs']);
    Route::delete('/delete/comment_blog/{id}', [blogController::class, 'delete_comment_blog']);

    Route::get('/create/love_blog/{id}', [love_blogController::class, 'create_love_blog']);
    Route::delete('/delete/love_blog/{id}', [love_blogController::class, 'delete_love_blog']);
    
    //contant
    Route::get('/messages', [Customer_messagesController::class, 'index']);
    Route::delete('/delete/message/{id}', [Customer_messagesController::class, 'delete']);
    
    //hrs
    Route::get('/hrs', [HrController::class, 'index']);
    Route::get('/hr/{id}', [HrController::class, 'show_hr']);

    //users
    Route::get('/users', [UsersController::class, 'index']);
    Route::post('/create/user', [UsersController::class, 'create']);
    Route::post('/update/img/{id}', [UsersController::class, 'update_img']);
    Route::delete('/delete/img/{id}', [UsersController::class, 'delete_img']);
    Route::post('/edit/personal_user/{id}', [UsersController::class, 'edit_personal_user']);
    Route::post('/edit/address_user/{id}', [UsersController::class, 'edit_address_user']);
    Route::post('/edit/education_user/{id}', [UsersController::class, 'edit_education_user']);
    Route::post('/edit/skill_user/{id}', [UsersController::class, 'edit_skill_user']);
    Route::delete('/delete/cv/{id}', [UsersController::class, 'delete_cv']);
    Route::post('/update/cv/{id}', [UsersController::class, 'update_cv']);
    Route::post('/edit/project_user/{id}', [UsersController::class, 'edit_project_user']);
    Route::post('/edit/WorkExperience_user/{id}', [UsersController::class, 'work_experience_user']);
    Route::post('/edit/WorkExperience_user2/{id}', [UsersController::class, 'work_experience_user2']);
    
    //job
    Route::get('/jobs', [JobsController::class, 'index']);
    Route::post('/job/expired/{id}', [JobsController::class, 'expired']);
    Route::post('/job/repost/{id}', [JobsController::class, 'repost']);
    Route::delete('/job/delete/{id}', [JobsController::class, 'delete']);
    Route::get('/jobs/internship', [JobsController::class, 'jobs_intern']);
    
    Route::get('/job/show_all', [JobsController::class, 'show_all']);
    Route::get('/job/show/{id}', [JobsController::class, 'show']);
    
    Route::get('/job/{name}/{location}/{section_id}', [JobsController::class, 'search_job']);
    Route::get('/job/{section_id}/', [JobsController::class, 'search_job_section']);
    
    Route::get('/jobs/hr/{id}', [JobsController::class, 'jobs_hr']);
    Route::get('/job', [JobsController::class, 'filterJobs']);
});

