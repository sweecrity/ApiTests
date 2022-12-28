<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Models\User;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index(Request $req)
    {
        $user = User::where('email',$req->email)->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return response([
                'message'=>['PROVIDED CREDENTIALS DOESNOT MATCH.']
            ],404);
        }
        $token=$user->createToken('my-app-token')->plainTextToken;

        $response =
        [
            'user'=>$user,
            'token'=>$token
        ] ;   
        return response($response,201);
    }
}
