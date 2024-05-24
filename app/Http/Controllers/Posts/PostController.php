<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class PostController extends Controller
{

    public function index(){
        $posts = Post::all();
        return response()->json([
           'status' => true,
           'message' => 'Lista de posts',
            'data'=>$posts,
        ]);
    }

    public function create(Request $request){
        try{
            $validatePost= Validator::make($request->all(),[
                'title' =>'required|unique:posts,title',
                'team_id' =>'required',
                'image_url' =>'required',
            ]);

            if($validatePost->fails()){
                return response()->json([
                   'status'=>false,
                   'message'=>'validation failed',
                    'errors'=>$validatePost->errors(),
                ],401);
            }

            $post = Post::create([
                'title' => $request->title,
                'team_id' => $request->team_id,
                'image_url' => $request->image_url,
                'description' => $request->description,
                'author' => $request->author,
            ]);

            return response()->json([
               'status'=>'success',
               'message'=>'Post created successfully',
            ],200);

        }catch(Throwable $th){
            return response()->json([
               'status'=>false,
               'message'=>'Something went wrong',
            ],401);
        }
    }

    public function update(Request $request){
        try{
            $validatePost= Validator::make($request->all(),[
                'id'=>'required',
                'title' =>'required|unique:posts,title',
                'team_id' =>'required',
                'image_url' =>'required',
            ]);

            if($validatePost->fails()){
                return response()->json([
                   'status'=>false,
                   'message'=>'validation failed',
                    'errors'=>$validatePost->errors(),
                ],401);
            }

            $post = Post::find($request->id);
            
            $post->update([
                'title' => $request->title,
                'team_id' => $request->team_id,
                'image_url' => $request->image_url,
                'description' => $request->description,
                'author' => $request->author,
            ]);

            $post->save();

            return response()->json([
               'status'=>'success',
               'message'=>'Post update successfully',
            ],200);

        }catch(Throwable $th){
            return response()->json([
               'status'=>false,
               'message'=>'Something went wrong',
            ],401);
        }
    }

    public function delete(Request $request){
        try{

            $validatePost = Validator::make($request->all(),[
                "id"=>"required"
            ]);

            if($validatePost->fails()){
                return response()->json([
                    'status'=>false,
                   'message'=>'validation failed',
                ]);
            }

            $post = Post::find($request->id);

            $post->delete();

            return response()->json([
               'status'=>'success',
               'message'=>'Post deleted successfully',
            ],200);

        }catch(Throwable $th){
            return response()->json([
               'status'=>false,
               'message'=>'Something went wrong',
            ],401);
        }
    }
}
