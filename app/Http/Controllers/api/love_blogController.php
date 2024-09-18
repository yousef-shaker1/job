<?php

namespace App\Http\Controllers\api;

use Svg\Tag\Rect;
use App\ApirequestTrait;
use App\Models\love_blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\love_blogResource;

class love_blogController extends Controller
{
    use ApirequestTrait;
    public function create_love_blog(Request $request, $id){
        $userId = Auth::id();
        $love_blog = love_blog::create([
            'user_id' => $userId, 
            'blog_id' => $id, 
        ]);
        if(!$love_blog){
            return $this->apiResponse(null, 'blog not found', 404);
        }
        return $this->apiResponse(new love_blogResource($love_blog), 'ok', 200);
    }

    public function delete_love_blog(Request $request, $id){
        $userId = Auth::id();
        $love_blog = love_blog::where('blog_id',$id)->where('user_id', $userId)->first();
        if(!$love_blog){
            return $this->apiResponse(null, 'blog not found', 404);
        }
        $love_blog->delete();
        
        return $this->apiResponse(null, 'delete love blog', 200);
    }
}
