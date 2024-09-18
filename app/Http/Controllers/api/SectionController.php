<?php

namespace App\Http\Controllers\api;

use App\Models\Section;
use App\ApirequestTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SectionResponce;
use Illuminate\Validation\ValidationException;

class SectionController extends Controller
{
    use ApirequestTrait;
    public function section_all(Request $request){
        $sections = SectionResponce::collection(Section::get());
        return $this->apiResponse($sections, 'ok', 200);
    }

    public function show_section(Request $request, $id){
        $section = Section::findorfail($id);
        if($section){
            return $this->apiResponse(new SectionResponce($section),'ok', 200);
        } else {
            return $this->apiResponse(null,'section not found', 404);
        }
    }

    public function create(Request $request){
        try{
            $validator = $request->validate([
                'name' => 'required|min:2|max:50',
            ]);
        } catch (ValidationException $e){
            return $this->apiResponse(null, $e->errors(), 400);
        }

        try{
            $section = Section::create($validator);
        } catch(\Exception $e){
            return $this->apiResponse(null, 'section creation failed', 401);
        }
        return $this->apiResponse(new SectionResponce($section), 'ok', 200);
    }

    public function edit(Request $request, $id){
        try{
            $validatedData = $request->validate([
                'name' => 'required|min:2|max:50',
            ]);
        } catch (ValidationException $e){
            return $this->apiResponse(null, $e->errors(), 400);
        }

        $section = Section::where('id',$id)->first();

        if(!$section){
            return $this->apiResponse(null, 'section not found', 401);
        }

        $section->update($validatedData);
        return $this->apiResponse(new SectionResponce($section), 'ok', 200);
    }

    public function delete(Request $request, $id){
        $section = Section::where('id', $id)->first();
        if(!$section){
            return $this->apiResponse(null, 'section not found', 401);
        }
        $section->delete();
        return $this->apiResponse(null, 'delete success', 200);
    }
}
