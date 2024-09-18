<?php

namespace App\Http\Controllers\api;

use id;
use Carbon\Carbon;
use App\Models\User;
use App\ApirequestTrait;
use App\Models\UserSkill;
use App\Models\UserAddress;
use App\Models\UserProfile;
use App\Models\UserProject;
use App\Models\UserPersonal;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\UserWorkExperience;
use App\Models\UserWorkExperience2;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UsersResource;
use App\Http\Resources\AddressResource;
use App\Http\Resources\EducateResource;
use App\Http\Resources\ProjectResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\PersonalResource;
use App\Models\UserEducationInformation;
use App\Http\Resources\WorkExperienceResource;
use Illuminate\Validation\ValidationException;
use App\Http\Resources\WorkExperienceResource2;

class UsersController extends Controller
{
    use ApirequestTrait;

    public function index(){
        $users = UsersResource::collection(UserProfile::all());
        return $this->apiResponse($users, 'ok', 200);
    }

    public function create(Request $request){
        
        try{
            $validation = $request->validate([
                'img' => 'nullable|image|max:1024',
                'first_name' => 'required|string|max:100',
                'middle_name' => 'required|string|max:100',
                'last_name' => 'required|string|max:100',
                'age' => 'required|integer|min:17|max:50',
                'job_title' => 'required|string|max:255',
                'year_experience' => 'nullable',
                'phone' => 'required|string', 
                'birth_day' => 'required|integer|min:1|max:31',
                'birth_month' => 'required|integer|min:1|max:12',
                'birth_year' => 'required|integer|min:1950|max:2008',
                'gender' => 'required|in:male,female,other',

                'address' => 'required|string|max:255',
                'city' => 'required|string|max:100',
                'state' => 'required|string|max:100',
                'zip' => 'required|string|max:10',

                //project1
                'project_name' => 'nullable|string|max:100',
                'project_description' => 'nullable|string|max:500',
                'skills_project' => 'nullable|string|max:355',
                'project_url' => 'nullable|integer',
                //project2
                'project_name2' => 'nullable|string|max:100',
                'project_description2' => 'nullable|string|max:500',
                'skills_project2' => 'nullable|string|max:355',
                'project_url2' => 'nullable|integer',
                //project3
                'project_name3' => 'nullable|string|max:100',
                'project_description3' => 'nullable|string|max:500',
                'skills_project3' => 'nullable|string|max:355',
                'project_url3' => 'nullable|integer',

                'company_name1' => 'nullable|string|max:100',
                'job_title1' => 'nullable|string|max:100',
                'job_description1' => 'nullable|string|max:355',
                'start_date_month1' => 'nullable|integer',
                'start_date_year1' => 'nullable|integer',
                //Work Experience2
                'company_name2' => 'nullable|string|max:100',
                'job_title2' => 'nullable|string|max:100',
                'job_description2' => 'nullable|string|max:355',
                'start_date_month2' => 'nullable|integer',
                'start_date_year2' => 'nullable|integer',
                'end_date_month2' => 'nullable|integer',
                'end_date_year2' => 'nullable|integer',
                //Work Experience3
                'company_name3' => 'nullable|string|max:100',
                'job_title3' => 'nullable|string|max:100',
                'job_description3' => 'nullable|string|max:355',
                'start_date_month3' => 'nullable|integer',
                'start_date_year3' => 'nullable|integer',
                'end_date_month3' => 'nullable|integer',
                'end_date_year3' => 'nullable|integer',

                'college' => 'required|string|max:100',
                'major' => 'required|string|max:100',
                'start_date_month_university' => 'required|string|max:100',
                'start_date_year_university' => 'required|string|max:100',

                'skills' => 'required|string|max:100',
                'cv' => 'nullable|file|mimes:pdf,doc,docx',
                'linkedin' => 'required|url',
                'github' => 'nullable|url',
            ]);
        } catch (ValidationException $e){
            return $this->apiResponse(null, $e->errors(), 400);
        }

        $path_cv = $request->cv ? $request->cv->store('cv_files', 'public') : null;
        $img_user = $request->img ? $request->img->store('img_user', 'public') : null;
        
        try {
            $birthDate = null;
            if (!empty($request->birth_day) && !empty($request->birth_month) && !empty($request->birth_year)) {
                $birthDate = Carbon::create($request->birth_year, $request->birth_month, $request->birth_day)->format('Y-m-d');
            }
            $User_Personal = UserPersonal::create([
                'img' => $img_user,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'age' => $request->age,
                'job_title' => $request->job_title,
                'year_experience' => $request->year_experience,
                'phone' => $request->phone,
                'birth_day' => $birthDate,
                'gender' => $request->gender,
            ]);


            $User_Address = UserAddress::create([
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
            ]);


            if(!empty($request->project_name) || !empty($request->project_description) || !empty($request->skills_project) || !empty($request->skills_project)){
                $UserProject = UserProject::create([
                'project_name' => $request->project_name,
                'project_description' => $request->project_description,
                'skills_project' => $request->skills_project,
                'project_url' => $request->project_url,
                'project_name2' => $request->project_name2,
                'project_description2' => $request->project_description2,
                'skills_project2' => $request->skills_project2,
                'project_url2' => $request->project_url2,
                'project_name3' => $request->project_name3,
                'project_description3' => $request->project_description3,
                'skills_project3' => $request->skills_project3,
                'project_url3' => $request->project_url3,
            ]);
            } else {
                $UserProject = null;
            }

            
            if(!empty($request->company_name1) || !empty($request->job_title1) || !empty($request->job_description1) || !empty($request->skills_project)){
                $data = [
                    'company_name1' => $request->company_name1,
                    'job_title1' => $request->job_title1,
                    'job_description1' => $request->job_description1,
                    'start_date_month1' => $request->start_date_month1,
                    'start_date_year1' => $request->start_date_year1,
                ];
                
                if (!$request->currently_working) {
                    $data['end_date_month1'] = $request->end_date_month1;
                    $data['end_date_year1'] = $request->end_date_year1;
                } else {
                    $data['currently_working'] = 'Currently working now';
                }
                // إنشاء السجل
                $UserWorkExperience = UserWorkExperience::create($data);
            } else {
                $UserWorkExperience = null;
            }
            if(!empty($request->company_name2) || !empty($request->job_title2) || !empty($request->job_description2)){
                $UserWorkExperience2 = UserWorkExperience2::create([
                    'company_name2' => $request->company_name2,
                    'job_title2' => $request->job_title2,
                    'job_description2' => $request->job_description2,
                    'start_date_month2' => $request->start_date_month2,
                    'start_date_year2' => $request->start_date_year2,    
                    'end_date_month2' =>  $request->end_date_month2,
                    'end_date_year2' => $request->end_date_year2,
                    'company_name3' => $request->company_name3,
                    'job_title3' => $request->job_title3,
                    'job_description3' => $request->job_description3,
                    'start_date_month3' => $request->start_date_month3,
                    'start_date_year3' => $request->start_date_year3,    
                    'end_date_month3' =>  $request->end_date_month3,
                    'end_date_year3' => $request->end_date_year3,
                ]);
            } else {
                $UserWorkExperience2 = null;
            }

            $data = [
                'college' => $request->college,
                'major' => $request->major,
                'start_date_month_university' => $request->start_date_month_university,
                'start_date_year_university' => $request->start_date_year_university,
            ];
            
            if ($request->end_date_month_university != "" && $request->end_date_year_university != "" ) {
                $data['end_date_month_university'] = $request->end_date_month_university;
                $data['end_date_year_university'] = $request->end_date_year_university;
            } else {
                $data['university_year'] = $request->university_year;
            }
            $UserEducationInformation = UserEducationInformation::create($data);

            $UserSkill = UserSkill::create([
                'skills' => $request->skills,
                'cv' => $path_cv,
                'linkedin' => $request->linkedin,
                'github' => $request->github,
            ]);

            $date = [
                'user_id' => Auth::id(),
                'user_personal_id' => $User_Personal->id,
                'user_education_information_id' => $UserEducationInformation->id,
                'user_address_id' => $User_Address->id,
                'user_skill_id' => $UserSkill->id,
            ];
            if(!empty($request->project_name) || !empty($request->project_description) || !empty($request->skills_project) || !empty($request->skills_project)){
                $date["user_project_id"] =$UserProject->id;
            }else {
                $date["user_project_id"] = null;
            }
            if(!empty($request->company_name1) || !empty($request->job_title1) || !empty($request->job_description1) || !empty($request->skills_project)){
                $date["user_work_experience_id"] =$UserWorkExperience->id;
            }else {
                $date["user_work_experience_id"] = null;
            }

            if($request->showJobForm2){
                $date["user_work_experience2_id"] =$UserWorkExperience2->id;
            } else {
                $date["user_work_experience2_id"] = null;
            }
            UserProfile::create($date);

            return $this->apiResponse(null, 'create user success', 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while creating the user',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    // public function edit(Request $request, $id){

    //     try{
    //         $validatedData = $request->validate([
    //             'first_name' => 'nullable|string|max:100',
    //             'middle_name' => 'nullable|string|max:100',
    //             'email' => [
    //                 'nullable',
    //                 'email',
    //                 Rule::unique('users', 'email')->ignore(Auth::user()->id),
    //             ],
    //             'last_name' => 'nullable|string|max:100',
    //             'age' => 'nullable|integer|min:17|max:50',
    //             'job_title' => 'nullable|string|max:255',
    //             'year_experience' => 'nullable',
    //             'phone' => 'nullable|string|digits:11', 
    //             'birth_day' => 'nullable',
    //             'address' => 'nullable|string|max:255',
    //             'city' => 'nullable|string|max:100',
    //             'state' => 'nullable|string|max:100',
    //             'zip' => 'nullable|string|max:10',
    //             'project_name' => 'nullable|string|max:150',
    //             'project_description' => 'nullable|string|max:500',
    //             'skills_project' => 'nullable|string|max:200',
    //             'project_url' => 'nullable|string|url|max:200',
    //             'project_name2' => 'nullable|string|max:150',
    //             'project_description2' => 'nullable|string|max:500',
    //             'skills_project2' => 'nullable|string|max:200',
    //             'project_url2' => 'nullable|string|url|max:200',
    //             'project_name3' => 'nullable|string|max:150',
    //             'project_description3' => 'nullable|string|max:500',
    //             'skills_project3' => 'nullable|string|max:200',
    //             'project_url3' => 'nullable|string|url|max:200',
    //             'company_name1' => 'nullable|string|max:255',
    //             'job_title1' => 'nullable|string|max:100',
    //             'job_description1' => 'nullable|string|max:400',
    //             'company_name2' => 'nullable|string|max:255',
    //             'job_title2' => 'nullable|string|max:100',
    //             'job_description2' => 'nullable|string|max:400',
    //             'company_name3' => 'nullable|string|max:255',
    //             'job_title3' => 'nullable|string|max:100',
    //             'job_description3' => 'nullable|string|max:400',
    //             'skills' => 'nullable',
    //         ]);
    //     } catch (ValidationException $e){
    //         return $this->apiResponse(null, $e->errors(), 400);
    //     }

    //     $user = UserProfile::where('user_id',$id)->first();
    //     $currentEmail = Auth::user()->email;
    //     if($request->email && $request->email !== $currentEmail){
    //         User::where('id', Auth::user()->id)->update([
    //             'email' => $request->email,
    //         ]);
    //     }

        

    //     UserPersonal::where('id', $user->user_personal_id)->update([
    //         'first_name' => $request->first_name,
    //         'middle_name' => $request->middle_name,
    //         'last_name' => $request->last_name,
    //         'age' => $request->age,
    //         'job_title' => $request->job_title,
    //         'year_experience' => $request->year_experience,
    //         'phone' => $request->phone,
    //         'birth_day' => $request->birth_day,
    //     ]);

    //     UserAddress::where('id', $user->user_address_id)->update([
    //         'address' => $request->address,
    //         'city' => $request->city,
    //         'state' => $request->state,
    //         'zip' => $request->zip,
    //     ]);

    //     UserProject::where('id', $user->user_address_id)->update([
    //         'project_name' => $request->project_name,
    //         'project_description' => $request->project_description,
    //         'skills_project' => $request->skills_project,
    //         'project_url' => $request->project_url,
    //         'project_name2' => $request->project_name2,
    //         'project_description2' => $request->project_description2,
    //         'skills_project2' => $request->skills_project2,
    //         'project_url2' => $request->project_url2,
    //         'project_name3' => $request->project_name3,
    //         'project_description3' => $request->project_description3,
    //         'skills_project3' => $request->skills_project3,
    //         'project_url3' => $request->project_url3,
    //     ]);

    //     $data = [
    //         'company_name1' => $request->company_name1,
    //         'job_title1' => $request->job_title1,
    //         'start_date_month1' => $request->start_date_month1,
    //         'start_date_year1' => $request->start_date_year1,
    //     ];
    //     if($request->currently_working || $request->end_date_month1 !== null && $request->end_date_year1 !== null){
    //         $data['end_date_month1'] = $request->end_date_month1;
    //         $data['end_date_year1'] = $request->end_date_year1;
    //         $data['currently_working'] = null;
    //     }
    //     UserWorkExperience::where('id', $user->user_work_experience_id)->update($data);

    //     $date = [
    //         'company_name2' => $request->company_name2,
    //         'job_title2' => $request->job_title2,
    //         'job_description2' => $request->job_description2,
    //         'start_date_month2' => $request->start_date_month2,
    //         'start_date_year2' => $request->start_date_year2,
    //         'end_date_month2' => $request->end_date_month2,
    //         'end_date_year2' => $request->end_date_year2,
    //         'company_name3' => $request->company_name3,
    //         'job_title3' => $request->job_title3,
    //         'job_description3' => $request->job_description3,
    //         'start_date_month3' => $request->start_date_month3,
    //         'start_date_year3' => $request->start_date_year3,
    //         'end_date_month3' => $request->end_date_month3,
    //         'end_date_year3' => $request->end_date_year3,
    //     ];
    //     UserWorkExperience2::findorfail($user->user_work_experience2_id)->update($date);


    //     $dataa = [
    //         'college' => $request->college,
    //         'major' => $request->major,
    //         'start_date_month_university' => $request->start_date_month_university,
    //         'start_date_year_university' => $request->start_date_year_university,
    //     ];
    //     if($request->university_year){
    //         $dataa['university_year'] = $request->university_year;
    //     }
    //     if($request->currently_university){
    //         $dataa['university_year'] = null;
    //         $dataa['end_date_month_university'] = $request->end_date_month_university;
    //         $dataa['end_date_year_university'] = $request->end_date_year_university;
    //     } 
    //     UserEducationInformation::where('id', $user->user_education_information_id)->update($dataa);


    //     $skills = UserSkill::where('id', $user->user_skill_id);
        
    //     $skills->update([
    //         'skills' => $request->skill,
    //     ]);
    //     return $this->apiResponse(null, 'edit success', 400);

    // }

    public function update_img(Request $request, $id){
        $user = UserProfile::where('id',$id)->first();
        $user_per = $user->userPersonal;

        if ($request->img) {
            // حذف الصورة القديمة إذا كانت موجودة
            if (!empty($user_per->img) && Storage::disk('public')->exists($user_per->img)) {
                Storage::disk('public')->delete($user_per->img);
            }

            // تخزين الصورة الجديدة
            $path = $request->img->store('img_user', 'public');

            $user_per->img = $path;
            $user_per->save();
        } else {
                return $this->apiResponse(null, 'image not found', 404);
            }
            return $this->apiResponse($path, 'ok', 200);
    }
    
    public function delete_img(Request $request, $id){
        $user = UserProfile::where('id',$id)->first();
        $user_per = $user->userPersonal;
        if (!empty($user_per->img) && Storage::disk('public')->exists($user_per->img)) {
            Storage::disk('public')->delete($user_per->img);
        } else {
            return $this->apiResponse(null, 'image not found', 404);
    }
        $user_per->update([
            'img' => null,
        ]);
        return $this->apiResponse(null, 'delete image success', 200);
    }

public function edit_personal_user(Request $request, $id)
{
    try {
        $request->validate([
            'first_name' => 'nullable|string|max:100',
            'middle_name' => 'nullable|string|max:100',
            'email' => [
                'nullable',
                'email',
                Rule::unique('users', 'email')->ignore(Auth::user()->id),
            ],
            'last_name' => 'nullable|string|max:100',
            'age' => 'nullable|integer|min:17|max:50',
            'job_title' => 'nullable|string|max:255',
            'year_experience' => 'nullable',
            'phone' => 'nullable|string|digits:11',
            'birth_day' => 'nullable',
        ]);
    } catch (ValidationException $e) {
        return $this->apiResponse(null, $e->errors(), 400);
    }

    $user = UserProfile::find($id);
    if (!$user) {
        return $this->apiResponse(null, 'User not found', 404);
    }

    if (!$user) {
        return $this->apiResponse(null, 'User personal record not found', 404);
    }
    
    $UserPersonal = UserPersonal::find($user->user_personal_id);
    if(!$UserPersonal){
        return $this->apiResponse(null, 'User personal not found', 404);
    }
    $fields = [
        'first_name','middle_name', 'last_name','age', 'job_title','year_experience','phone','birth_day',
    ];

    foreach($fields as $field){
        if($request->filled($field)){
            $UserPersonal->$field = $request->$field;
        }
    }

    // تحديث البريد الإلكتروني إذا كان مختلفًا عن الحالي
    $currentEmail = Auth::user()->email;
    if ($request->filled('email') && $request->email !== $currentEmail) {
        User::where('id', Auth::id())->update([
            'email' => $request->email,
        ]);
    }

    $UserPersonal->save();

    return $this->apiResponse(new PersonalResource($UserPersonal), 'edit personal success', 200);
}

public function edit_address_user(Request $request, $id){
    try {
        $request->validate([
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'zip' => 'nullable|string|max:10',
        ]);
    } catch (ValidationException $e) {
        return $this->apiResponse(null, $e->errors(), 400);
    }

    $user = UserProfile::find($id);
    if (!$user) {
        return $this->apiResponse(null, 'User not found', 404);
    }
    
    $UserAddress = UserAddress::find($user->user_address_id);
    if(!$UserAddress){
        return $this->apiResponse(null, 'User User Address not found', 404);
    }

    $fields = [
        'address', 'city', 'state', 'zip'
    ];
    foreach($fields as $field){
        if($request->filled($field)){
            $UserAddress->$field = $request->$field;
        }
    }
    
    $UserAddress->save();

    return $this->apiResponse(new AddressResource($UserAddress), 'edit address success', 200);
}


public function edit_education_user(Request $request, $id){
    try {
        $request->validate([
            'college' => 'nullable|string|max:100',
            'major' => 'nullable|string|max:100',
            'start_date_month_university' => 'nullable',
            'start_date_year_university' => 'nullable',
        ]);
    } catch (ValidationException $e) {
        return $this->apiResponse(null, $e->errors(), 400);
    }

    $user = UserProfile::find($id);
    if (!$user) {
        return $this->apiResponse(null, 'User not found', 404);
    }
    $UserEducation = UserEducationInformation::where('id', $user->user_education_information_id)->first();
        
        if($request->filled('university_year')){
            $UserEducation->university_year = $request->university_year;
            $UserEducation->end_date_month_university = null;
            $UserEducation->end_date_year_university = null;
        } 
        if ($request->filled('end_date_month_university') && $request->filled('end_date_year_university')){
            $UserEducation->end_date_month_university = $request->end_date_month_university;
            $UserEducation->end_date_year_university = $request->end_date_year_university;
            $UserEducation->university_year = null;
        }

        $fields = [
            'college', 'major', 'start_date_month_university', 'start_date_year_university'
        ];
        foreach($fields as $field){
            if($request->filled($field)){
                $UserEducation->$field = $request->$field;
            }
        }
        $UserEducation->save();

    return $this->apiResponse(new EducateResource($UserEducation), 'edit education success', 200);
}

public function edit_skill_user(Request $request, $id){
    try {
        $request->validate([
            'skills' => 'required',
        ]);
    } catch (ValidationException $e) {
        return $this->apiResponse(null, $e->errors(), 400);
    }

    $user = UserProfile::find($id);
    if (!$user) {
        return $this->apiResponse(null, 'User not found', 404);
    }
    $UserSkills = UserSkill::where('id', $user->user_skill_id)->first();
    if (!$UserSkills) {
        return $this->apiResponse(null, 'User skills not found', 404);
    }
    if ($request->filled('skills')) {
        $UserSkills->skills = $request->skills;
    }
    $UserSkills->save();

    return $this->apiResponse($UserSkills, 'edit skills success', 200);
}


public function update_cv(Request $request, $id){
    $user = UserProfile::find($id);
    if (!$user) {
        return $this->apiResponse(null, 'User not found', 404);
    }
    $user_per = $user->UserSkill;

    if ($request->cv) {
        if (!empty($user_per->cv) && Storage::disk('public')->exists($user_per->cv)) {
            Storage::disk('public')->delete($user_per->cv);
        }

        $path = $request->cv->store('cv_files', 'public');

        $user_per->cv = $path;
        $user_per->save();
    } else {
        return $this->apiResponse(null, 'cv not found', 404);
    }
    return $this->apiResponse($path, 'cv create success', 200);
}

public function delete_cv(Request $request, $id){
    $user = UserProfile::find($id);
    if (!$user) {
        return $this->apiResponse(null, 'User not found', 404);
    }
    $user_per = $user->UserSkill;
    if (!empty($user_per->cv) && Storage::disk('public')->exists($user_per->cv)) {
        Storage::disk('public')->delete($user_per->cv);
    } else {
        return $this->apiResponse(null, 'cv not found', 404);
}
    $user_per->update([
        'cv' => null,
    ]);
    return $this->apiResponse(null, 'delete cv success', 200);
}


public function edit_project_user(Request $request, $id){
    try {
        $request->validate([
            'project_name' => 'nullable|string|max:150',
            'project_description' => 'nullable|string|max:500',
            'skills_project' => 'nullable|string|max:200',
            'project_url' => 'nullable|string|url|max:200',
            'project_name2' => 'nullable|string|max:150',
            'project_description2' => 'nullable|string|max:500',
            'skills_project2' => 'nullable|string|max:200',
            'project_url2' => 'nullable|string|url|max:200',
            'project_name3' => 'nullable|string|max:150',
            'project_description3' => 'nullable|string|max:500',
            'skills_project3' => 'nullable|string|max:200',
            'project_url3' => 'nullable|string|url|max:200',
        ]);
    } catch (ValidationException $e) {
        return $this->apiResponse(null, $e->errors(), 400);
    }

    $user = UserProfile::find($id);
    if (!$user) {
        return $this->apiResponse(null, 'User not found', 404);
    }
    $UserProject = UserProject::find($user->user_project_id);
    if (!$UserProject) {
        return $this->apiResponse(null, 'User project not found', 404); // تعديل الرسالة لتكون أوضح
    }
    $fields = [
        'project_name', 'project_description', 'skills_project', 'project_url',
        'project_name2', 'project_description2', 'skills_project2', 'project_url2',
        'project_name3', 'project_description3', 'skills_project3', 'project_url3'
    ];

    foreach($fields as $field){
        if($request->filled($field)){
            $UserProject->$field = $request->$field;
        }
    }

    $UserProject->save();

    return $this->apiResponse(new ProjectResource($UserProject), 'edit project success', 200);
}

public function work_experience_user(Request $request, $id){
    try {
        $request->validate([
            'company_name1' => 'nullable|string|max:255',
            'job_title1' => 'nullable|string|max:100',
            'job_description1' => 'nullable|string|max:400',
            'start_date_month1' => 'nullable',
            'start_date_year1' => 'nullable',
        ]);
    } catch (ValidationException $e) {
        return $this->apiResponse(null, $e->errors(), 400);
    }

    $user = UserProfile::find($id);
    if (!$user) {
        return $this->apiResponse(null, 'User not found', 404);
    }
    $work_experience = UserWorkExperience::find($user->user_work_experience_id);
    if (!$work_experience) {
        return $this->apiResponse(null, 'User Work Experience not found', 404); // تعديل الرسالة لتكون أوضح
    }
    $fields = [
        'company_name1', 'job_title1', 'job_description1'
    ];
    
        foreach($fields as $field){
            if($request->filled($field)){
                $work_experience->$field = $request->$field;
            }
        }

        if($request->currently_working || $request->end_date_month1 !== null && $request->end_date_year1 !== null){
            $work_experience['end_date_month1'] = $request->end_date_month1;
            $work_experience['end_date_year1'] = $request->end_date_year1;
            $work_experience['currently_working'] = null;
        }


    $work_experience->save();

    return $this->apiResponse(new WorkExperienceResource($work_experience), 'edit project success', 200);
}

public function work_experience_user2(Request $request, $id){
    try {
        $request->validate([
            'company_name2' => 'nullable|string|max:255',
            'job_title2' => 'nullable|string|max:100',
            'job_description2' => 'nullable|string|max:400',
            'start_date_month2' => 'nullable',
            'start_date_year2' => 'nullable',
            'end_date_month2' => 'nullable',
            'end_date_year2' => 'nullable',
            'company_name3' => 'nullable|string|max:255',
            'job_title3' => 'nullable|string|max:100',
            'job_description3' => 'nullable|string|max:400',
            'start_date_month3' => 'nullable',
            'start_date_year3' => 'nullable',
            'end_date_month3' => 'nullable',
            'end_date_year3' => 'nullable',
        ]);
    } catch (ValidationException $e) {
        return $this->apiResponse(null, $e->errors(), 400);
    }

    $user = UserProfile::find($id);
    if (!$user) {
        return $this->apiResponse(null, 'User not found', 404);
    }
    $work_experience2 = UserWorkExperience2::find($user->user_work_experience2_id);
    if (!$work_experience2) {
        return $this->apiResponse(null, 'User Work Experience2 not found', 404); 
    }
    $fields = [
        'company_name2', 'job_title2', 'job_description2', 'start_date_month2', 
        'start_date_year2', 'end_date_month2', 'end_date_year2','company_name3', 'job_title3', 'job_description3', 'start_date_month3', 
        'start_date_year3', 'end_date_month3', 'end_date_year3',
    ];
    
        foreach($fields as $field){
            if($request->filled($field)){
                $work_experience2->$field = $request->$field;
            }
        }

    $work_experience2->save();

    return $this->apiResponse(new WorkExperienceResource2($work_experience2), 'edit project success', 200);
}



}
