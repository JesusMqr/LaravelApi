<?php

namespace App\Http\Controllers\api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return response()->json([
            'status' => true,
            'message' => 'Lista de usuarios',
            'data'=>$users,
        ],200);
    }
}
