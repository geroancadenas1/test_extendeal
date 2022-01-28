<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;



class UsersController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function authenticate(Request $request)
    {
      $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Acceso no Autorizado'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Acceso no Autorizado'], 500);
        }
       return response()->json(compact('token'));
    }

    public function getAuthenticatedUser()
    {
      try {
              if (!$user = JWTAuth::parseToken()->authenticate()) {
                      return response()->json(['user_not_found'], 404);
              }
              } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                      return response()->json(['token_expired'], $e->getStatusCode());
              } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                      return response()->json(['token_invalid'], $e->getStatusCode());
          } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
                      return response()->json(['token_absent'], $e->getStatusCode());
          }
          return response()->json(compact('user'));
    }
    

    function index(Request $request){

      if($request->isJson()){
        $users = User::all();
        return response()->json($users, 200);
      } else 
      {  return response()->json(['error','Proceso no Autorizado'], 401, []); } 


    }

    function createUser(Request $request){

        if($request->isJson()){

            $data = $request->json()->all();

            $user =User::create([ 
                'name'=>$data['name'],
                'username'=>$data['username'],
                'email'=>$data['email'],
                'password'=>Hash::make($data['password']),
                'api_token'=>Str::random(60),
                
            ]);
           
            $token = JWTAuth::fromUser($user);

            return response()->json(compact('user','token'),201);

          } else 
          {  return response()->json(['error','Proceso no Autorizado'], 401); } 
  
  
      }

      function getToken(Request $request) 
      {

        if($request->isJson()){

            try{
                $data = $request->json()->all();
                $user = User::where('username', $data['username'])->first();
               
                if($user &&  Hash::check($data['password'],  $user->password)) 
                { 
                    return response()->json($user, 200);
                }
                  else 
                {   return response()->json(['error','No existe usuario autorizado'], 406); }

            }catch (ModelNotFoundException $e){
                return response()->json(['error','No existe usuario autorizado'], 406);
            }
          } else 
          {  return response()->json(['error','Proceso no Autorizado'], 401, []); } 

      }

      

}
