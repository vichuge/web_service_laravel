<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pokemons;
use App\Http\Controllers\SesionController;

class PokemonController extends Controller{
    /*$exist=SesionController::login($request->email,$request->password);
    if($exist['status']=='true'){
        //Código para la función
        return ['status'=>'true'];
    }else{
        return $exist;
    }*/
    public function store(Request $request){
        $exist=SesionController::login($request->email,$request->password);
        if($exist['status']=='true'){
            //Instanciamos la clase Pokemons
            $pokemon = new Pokemons;
            //Declaramos el nombre con el nombre enviado en el request
            $pokemon->name = $request->name;
            //Guardamos el cambio en nuestro modelo
            $pokemon->save();
            return ['status'=>'true'];
        }else{
            return $exist;
        }
    }

    public function destroy(Request $request,$id){
        $exist=SesionController::login($request->email,$request->password);
        if($exist['status']=='true'){
            Pokemons::where('id','=',$id)->delete();
            return ['status'=>'true'];
        }else{
            return $exist;
        }
    }

    public function update(Request $request, $id){
        $now=date("Y-m-d H:i:s");
        $exist=SesionController::login($request->email,$request->password);
        if($exist['status']=='true'){
            $campos=[
                'name'=>$request->name,
                'updated_at'=>$now
            ];
            Pokemons::where('id','=',$id)->update($campos);
            return ['status'=>'true'];
        }else{
            return $exist;
        }
    }

    public function show(Request $request,$id){
        $exist=SesionController::login($request->email,$request->password);
        if($exist['status']=='true'){
            return Pokemons::where('id', $id)->get();
        }else{
            return $exist;
        }
    }

    public function list(Request $request){
        $exist=SesionController::login($request->email,$request->password);
        if($exist['status']=='true'){
            return Pokemons::get();
        }else{
            return $exist;
        }
    }
}
