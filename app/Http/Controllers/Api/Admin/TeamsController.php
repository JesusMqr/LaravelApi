<?php

namespace App\Http\Controllers\API\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Validator;
use Throwable;

class TeamsController extends Controller
{
    public function index(){
        $teams = Team::all();
        return response()->json([
           'status' => true,
           'message' => 'Lista de equipos',
            'data'=>$teams,
        ]);
    }

    public function create(Request $request){
        try{
            $validateTeam= Validator::make($request->all(),
            [
                'name'=>'required|unique:teams,name',
                'display_name'=>'required',
                'description'=>'nullable',
            ]);
            if($validateTeam->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>'validation failed',
                    'errors'=>$validateTeam->errors(),
                ],401);
            }

            $team=Team::create([
                'name'=>$request->name,
                'display_name'=>$request->display_name,
                'description'=>$request->description,
            ]);

            return response()->json([
                'status'=>'success',
                'message'=>'Team created successfully',
            ],200);
        }catch(Throwable $th){
            return response()->json([
                'status'=>false,
               'message'=>'Something went wrong',
            ],401);
        }
    }

    public function update (Request $request){
        try{
            $validateTeam= Validator::make($request->all(),
            [
                'id'=>'required',
                'name'=>'required',
                'display_name'=>'required',
                'description'=>'required',
            ]);
            if($validateTeam->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>'validation failed',
                    'errors'=>$validateTeam->errors(),
                ],401);
            }

            $team=Team::find($request->id);
            if(!$team){
                return response()->json([
                    'status' => false,
                    'message' => 'El team que intenta modifcar no existe',
                ], 401); 
            }

            $team->update([
                'name'=>$request->name,
                'display_name'=>$request->display_name,
                'description'=>$request->description,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'El team ha sido actualziado con exito',
            ], 201); 

        }catch(Throwable $th){
            return response()->json([
                'status'=>false,
               'message'=>'Something went wrong',
            ],401);
        }
    }

    public function delete(Request $request) {
        try {
            $id = $request->input('id');
            $team = Team::find($id);
    
            if (!$team) {
                return response()->json([
                    'status' => false,
                    'message' => 'El equipo que intenta eliminar no existe',
                    'id' => $id,
                ], 404); // Cambiado el código de estado a 404 Not Found
            }
    
            $team->delete();
            return response()->json([
                'status' => true,
                'message' => 'El equipo ha sido eliminado con éxito',
            ], 200); // Cambiado el código de estado a 200 OK
    
        } catch(Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Ocurrió un error al procesar la solicitud',
            ], 500); // Cambiado el código de estado a 500 Internal Server Error
        }
    }
    
}
