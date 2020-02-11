<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sesiones;

class SesionController extends Controller
{
    /*public function login(Request $request)
    {
        $sesion=new Sesiones;
        $sesion->email=$request->email;
        //Password encriptado con SHA512
        $sesion->password=$request->password;

        $exist=Sesiones::where('email',"=",$sesion->email)->where('password','=',$sesion->password)->get();
        if(isset($exist[0])){
            session()->put('email',$sesion->email);
            session()->put('password',$sesion->password);
            $valor=[
                'email'=>session('email')
            ];
        }else{
            $valor=[
                'email'=>'false',
            ];
        }
        return $valor; 
    }*/

    static function login($email="null",$password="null"){
        if($email!="null" && $password!="null"){
            $exist=Sesiones::where('email',"=",$email)->where('password','=',$password)->get();
            if(isset($exist[0])){
                return ['status'=>'true'];
            }else{
                return [
                    'error'=>'401',
                    'status'=>'Unauthorised authentication failure'
                ];
            }
            //return $email;
        }else{
            return [
                'error'=>'401',
                'status'=>'Unauthorised authentication failure'
            ];
        }
        //return ['email'=>session('email')];
    }

    /*static function logout(){
        session()->forget('email');
        session()->forget('password');
        $valor=[
            'email'=>session('email')
        ];
        return $valor;
    }*/
}
