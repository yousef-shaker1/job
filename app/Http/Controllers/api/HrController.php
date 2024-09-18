<?php

namespace App\Http\Controllers\api;

use App\ApirequestTrait;
use App\Models\HrAccount;
use Illuminate\Http\Request;
use App\Http\Resources\HrResource;
use App\Http\Controllers\Controller;

class HrController extends Controller
{
    use ApirequestTrait;

    public function index(){
        $hrs = HrResource::collection(HrAccount::all());
        return $this->apiResponse($hrs, 'ok', 200);
    }

    public function show_hr(Request $request, $id){
        $hr = HrAccount::find($id);
        if(!$hr){
            return $this->apiResponse(null, 'hr not found', 404);
        }
        return $this->apiResponse(new HrResource($hr), 'ok', 200);
    }
}
