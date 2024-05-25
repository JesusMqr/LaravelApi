<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ChapterController extends Controller
{
    public function index(){
        $chapters = Chapter::all();
        return response()->json([
           'status' => true,
           'message' => 'Lista de chapters',
            'data'=>$chapters,
        ]);
    }

    public function create(Request $request){
        try{
            $validateChapter= Validator::make($request->all(),[
                'title' =>'required|unique:chapters,title',
                'post_id' =>'required',
            ]);

            if($validateChapter->fails()){
                return response()->json([
                   'status'=>false,
                   'message'=>'validation failed',
                    'errors'=>$validateChapter->errors(),
                ],401);
            }

            $chapter = Chapter::create([
                'title' => $request->title,
                'post_id' => $request->post_id,
            ]);

            return response()->json([
               'status'=>'success',
               'message'=>'Chapter created successfully',
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
            $validateChapter= Validator::make($request->all(),[
                'id'=>'required',
                'title' =>'required|unique:chapters,title',
                'post_id' =>'required',
            ]);

            if($validateChapter->fails()){
                return response()->json([
                   'status'=>false,
                   'message'=>'validation failed',
                    'errors'=>$validateChapter->errors(),
                ],401);
            }

            $chapter = Chapter::find($request->id);
            
            $chapter->update([
                'title' => $request->title,
                'post_id' => $request->post_id,
            ]);

            $chapter->save();

            return response()->json([
               'status'=>'success',
               'message'=>'Chapter update successfully',
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

            $chapter = Chapter::find($request->id);

            $chapter->delete();

            return response()->json([
               'status'=>'success',
               'message'=>'Chapter deleted successfully',
            ],200);

        }catch(Throwable $th){
            return response()->json([
               'status'=>false,
               'message'=>'Something went wrong',
            ],401);
        }
    }

    public function show(Request $request){
        try{
            $validateChapter = Validator::make($request->all(),[
                "id"=>"required"
            ]);


            if($validateChapter->fails()){
                return response()->json([
                    'status'=>false,
                   'message'=>'validation failed',
                ]);
            }

            $chapter = Chapter::find($request->id);

            if(!$chapter){
                return response()->json([
                   'status'=>false,
                   'message'=>'Chapter not found',
                ]);
            }
            return response()->json([
               'status'=>'success',
               'message'=>'Chapter show successfully',
                'data'=>$chapter,
            ],200);
        }catch(Throwable $th){
            return response()->json([
                'status'=>false,
               'message'=>'Something went wrong',
            ]);
        }
    }

    public function getPictures(Request $request){
        try{
            $validateChapter = Validator::make($request->all(),[
                "id"=>'required'
            ]);

            if($validateChapter->fails()) {
                return response()->json([
                    'status'=>false,
                   'message'=>'validation failed',
                ]);
            }

            $chapter = Chapter::find($request->id);

            $pictures= $chapter->pictures;

            if(0 >= $pictures->count()){
                return response()->json([
                   'status'=>false,
                   'message'=>'pictures not found',
                ]);
            }
            return response()->json([
                'status'=>'success',
               'message'=>'pictures show successfully',
               'data'=>$pictures,
            ]);

        }catch(Throwable $th){
            return response()->json([
                'status'=>false,
               'message'=>'Something went wrong',
            ]);
        }
    }
}
