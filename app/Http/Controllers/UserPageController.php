<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\Section;
use App\Models\Position;
use App\Models\UserProfile;
use App\Models\comment_blog;
use App\Models\love_blog;
use App\Models\UserPersonal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserPageController extends Controller
{

    public function welcome(){
        $jobs = Position::latest()->take(6)->get();
        $check_user = Auth::check() ? UserProfile::where('user_id', Auth::user()->id)->exists() : false;
        $sections = Section::get();
        return view('welcome', compact('jobs', 'check_user', 'sections'));
    }
        
    public function jobs_page(){
        return view('user_page.jobs');
    }

    public function blog_page(){
        $blogs = blog::paginate(6);
        return view('user_page.blog', compact('blogs'));
    }
    public function single_blog($id){
            $blog = blog::findorfail($id);
            $comment_blogs = comment_blog::where('blog_id',$id)->get();
            $comment_blogIds = $comment_blogs->pluck('id');
            $count_comment = $comment_blogs->count();
            if(Auth::check()){
                $check = UserProfile::where('user_id', Auth::user()->id)->exists();
            } else{
                $check = false;
            }
            $comment_blog_users = $comment_blogs->pluck('user_id');
            $UserProfiles = UserProfile::whereIn('user_id', $comment_blog_users)->get()->keyBy('user_id');
            return view('user_page.single-blog', compact('blog', 'check', 'comment_blogs', 'count_comment','UserProfiles'));
    }

    public function save_comment(Request $request, $id){
        comment_blog::create([
            'user_id' => Auth::user()->id,
            'blog_id' => $id,
            'comment' => $request->comment,
        ]);
        return redirect()->back();
    }
    public function contact_page(){
        return view('user_page.contact');
    }
    public function login_user(){
        return view('user_page.login1');
    }
    public function login_clint(){
        return view('user_page.login_clint');
    }
    public function view_profile_user($id){
        $check = UserProfile::where('user_id', Auth::user()->id)->exists();
        return view('user_page.view_profile_user', compact('id', 'check'));
    }
    public function edit_profile_user(){
        return view('user_page.edit_profile_user');
    }
    public function internship_page(){
        return view('user_page.internship');
    }
    public function about_page(){
        return view('user_page.about');
    }
    public function cv_page(){
        return view('cv.cv_form');
    }
    public function Featured_job_page(){
        return view('user_page.Featured_job');
    }
    public function search_job(Request $request){
        $jobName = $request->input('job_name', '');
        $country = $request->input('country', '');    
        $section_id = $request->input('section_id', '');
        if (empty($jobName) || empty($country) || empty($section_id)) {
            return redirect()->route('jobspage');
        }    
        return redirect()->route('job', [
            'job_name' => $jobName,
            'country' => $country,
            'section_id' => $section_id,
        ]);
    }
    
    public function job($job_name, $country, $section_id){
        
        return view('user_page.jobs', [
            'job_name' => $job_name,
            'country' => $country,
            'section_id' => $section_id,
        ]);
    }

    public function search_section(Request $request, $section_id){
        return view('user_page.jobs', [
            'section_id' => $section_id,
        ]);
    }
}
