<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) : JsonResponse
    {
        //
        $credentials =request([
            'email',
            'password'
        ]);

        if(! $token = auth('api')->attempt($credentials) ){
            return response()->json([
                'error'=>'No autorizado'],
                status:401
            );
        }

        return response()->json([
            'token'=>$token
        ]);
    }
}
