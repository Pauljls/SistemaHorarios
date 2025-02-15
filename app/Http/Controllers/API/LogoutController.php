<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        try{
            auth()->logout();

            return response()->json(["mensaje"=>"Log out Exitoso"],status:200);
        }catch(JWTException $exception){
                return response()->json([
                "mensaje"=>"No tienes acceso"    
                ], status : 401);
        }
    }
}
