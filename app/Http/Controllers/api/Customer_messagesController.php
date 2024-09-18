<?php

namespace App\Http\Controllers\api;

use App\Models\contact;
use App\ApirequestTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;

class Customer_messagesController extends Controller
{
    use ApirequestTrait;
    public function index(){
        $message = MessageResource::collection(contact::all());
        return $this->apiResponse($message, 'ok',200);
    }
    
    public function delete(Request $request, $id){
        $message = contact::find($id);
        if(!$message){
            return $this->apiResponse(null, 'not found',200);
        } 
        try{
                $message->delete();
        } catch(\Exception $e){
            return $this->apiResponse(null, 'not found',200);
        }
        return $this->apiResponse(null, 'delete success',200);
    }
}
