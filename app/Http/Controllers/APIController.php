<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;

class APIController extends Controller
{
    public $loginAfterSignUp = true;
    public function login(Request $request){

        $token = null;
        $camposJson = json_decode($request->getContent(), JSON_OBJECT_AS_ARRAY);
        $credenciais = ['email' => $camposJson['email'], 'password' => $camposJson['password']];
        try{
            if(!$token = JWTAuth::atempt($credenciais)) {
                return response()->json([ 'sucess' => false, 'message'=> 'Crendiais incorretas'], 401);

            }
        } catch(JWTException $e){
            return response()->json(['error' => 'token nao criado'], 500);
        }

        return response()->json(['sucess' => true, 'token' => $token]);
    }
    public function logout(request $request){

        $this->validate($request, ['token' => 'required']);
        try{
            JWTAuth::invalidate($request->token);
            return response()->json(['sucess'=> true, 'message'=> 'Adios ;( ']);

        } catch(JWTException $e){
            return response()->json(['sucess' => false, 'message' => 'Erro, Voce nao ira embora D:'], 500);
         }
    }
}
