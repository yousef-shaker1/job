<?php

namespace App\Http\Controllers\api;

use App\Models\blog;
use App\ApirequestTrait;
use Illuminate\Support\Str;
use App\Models\comment_blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Http\Resources\CommentResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class BlogController extends Controller
{
    use ApirequestTrait;
    
    public function index(){
        $blogs = BlogResource::collection(blog::all());
        return $this->apiResponse($blogs, 'ok', 200);
    }

    public function show_blog(Request $request, $id){
        $blog = blog::findorfail($id);
        if($blog){
            return $this->apiResponse(new BlogResource($blog),'ok', 200);
        } else {
            return $this->apiResponse(null,'blog not found', 404);
        }
    }

    public function create(Request $request){
        try{
            $validated = $request->validate([
                'img' => 'required',
                'title' => 'required|min:2|max:90',
                'body' => 'required|min:20|max:600',
            ]);
        } catch (ValidationException $e){
            return $this->apiResponse(null, $e->errors(), 400);
        }
        try{
            if($request->hasFile('img')){
                $image = $request->file('img');
                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();

                $path = $image->storeAs('public/blogs', $imageName);
                $validated['img'] = 'blogs/' . $imageName;
                
            }
        } catch (ValidationException $e){
            return $this->apiResponse(null, $e->errors(), 400);
        }

        try{
            $blog = blog::create($validated);
        } catch(\Exception $e){
            return $this->apiResponse(null, 'blog creation failed', 401);
        }
        return $this->apiResponse(new BlogResource($blog), 'ok', 200);
    }




    public function edit(Request $request, $id){
        try{
            $validatedData = $request->validate([
                'img' => 'nullable',
                'title' => 'nullable|min:2|max:90',
                'body' => 'nullable|min:20|max:600',
            ]);
        } catch (ValidationException $e){
            return $this->apiResponse(null, $e->errors(), 400);
        }

        $blog = blog::where('id',$id)->first();

        if(!$blog){
            return $this->apiResponse(null, 'blog not found', 401);
        }

        if($request->hasFile('img')){
            try{
                if($blog->img){
                Storage::disk('public')->delete($blog->img);
                }
                $image = $request->file('img');
                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/blogs', $imageName);
                $validatedData['img'] = 'blogs/' . $imageName;
            } catch (ValidationException $e){
                return $this->apiResponse(null, 'Image upload failed', 500);
            }
        }



        $blog->update($validatedData);
        return $this->apiResponse(new BlogResource($blog), 'blog updated success', 200);
    }

    public function delete(Request $request, $id){
        $blog = blog::where('id', $id)->first();
        if($blog->img){
            Storage::disk('public')->delete($blog->img);
        }
        if(!$blog){
            return $this->apiResponse(null, 'blog not found', 404);
        }
        $blog->delete();
        return $this->apiResponse(null, 'blog delete success', 200);
    }
    
    public function comment_blogs(Request $request, $id) {
        // البحث عن التعليقات المرتبطة بالمدونة
        $comments = comment_blog::where('blog_id', $id)->get();
        // التحقق إذا كانت المجموعة فارغة
        if ($comments->isEmpty()) {
            return $this->apiResponse(null, 'comment not found', 404);
        }
        return $this->apiResponse(CommentResource::collection($comments), 'ok', 200);
    }
    
        public function delete_comment_blog(Request $request, $id){
            $blog = comment_blog::where('id', $id)->first();
            
            if(!$blog){
                return $this->apiResponse(null, 'comment not found', 404);
            }
            $blog->delete();
            return $this->apiResponse(null, 'blog delete success', 200);
        }
}
