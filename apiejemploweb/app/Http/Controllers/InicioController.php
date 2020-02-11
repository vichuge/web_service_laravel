<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    var $arr = array(
        "email"=>"correo@c.com",
        "password"=>"3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79"
    );

    public function index()
    {
        //127.0.0.1:8000/api/pokemons/list
        $post_json = json_encode($this->arr);
        $endpoint = '127.0.0.1:8000/api/pokemons/list';
        $ch = @curl_init();
        @curl_setopt($ch, CURLOPT_POST, true);
        @curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
        @curl_setopt($ch, CURLOPT_URL, $endpoint);
        @curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = @curl_exec($ch);
        $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_errors = curl_error($ch);
        @curl_close($ch);
        $datos['pokemones']=json_decode($response,true);
        //print_r($datos['pokemones']);
        return view('welcome',$datos);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $campos=['name'=>'required|string|max:50'];
        $Mensaje = ["required" => ':attribute es requerido'];
        $this->validate($request, $campos, $Mensaje);
        $datosPokemon = request()->except('_token');
        $envioDatos=$datosPokemon+$this->arr;
        print_r($envioDatos);

        //127.0.0.1:8000/api/pokemons/store
        $post_json=json_encode($envioDatos);
        $endpoint = '127.0.0.1:8000/api/pokemons/store';
        $ch = @curl_init();
        @curl_setopt($ch, CURLOPT_POST, true);
        @curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
        @curl_setopt($ch, CURLOPT_URL, $endpoint);
        @curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = @curl_exec($ch);
        $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_errors = curl_error($ch);
        @curl_close($ch);
        //print_r($datos['pokemones']);
        return redirect('/');
    }

    public function edit($id)
    {
        //127.0.0.1:8000/api/pokemons/show/1
        $post_json = json_encode($this->arr);
        $endpoint = '127.0.0.1:8000/api/pokemons/show/'.$id;
        $ch = @curl_init();
        @curl_setopt($ch, CURLOPT_POST, true);
        @curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
        @curl_setopt($ch, CURLOPT_URL, $endpoint);
        @curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = @curl_exec($ch);
        $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_errors = curl_error($ch);
        @curl_close($ch);
        $datos['pokemon']=json_decode($response,true);
        //print_r($datos['pokemones']);
        return view('edit',$datos);

    }

    public function update(Request $request, $id)
    {
        //127.0.0.1:8000/api/pokemons/update/3
        $campos=['name'=>'required|string|max:50'];
        $Mensaje = ["required" => ':attribute es requerido'];
        $this->validate($request, $campos, $Mensaje);
        $datosPokemon = request()->except('_token');
        $envioDatos=$datosPokemon+$this->arr;
        //print_r($envioDatos);

        $post_json=json_encode($envioDatos);
        $endpoint = '127.0.0.1:8000/api/pokemons/update/'.$id;
        $ch = @curl_init();
        @curl_setopt($ch, CURLOPT_POST, true);
        @curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
        @curl_setopt($ch, CURLOPT_URL, $endpoint);
        @curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = @curl_exec($ch);
        $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_errors = curl_error($ch);
        @curl_close($ch);
        //print_r($datos['pokemones']);
        return redirect('/');
    }

    public function destroy($id)
    {
        //127.0.0.1:8000/api/pokemons/destroy/3
        $post_json=json_encode($this->arr);
        $endpoint = '127.0.0.1:8000/api/pokemons/destroy/'.$id;
        $ch = @curl_init();
        @curl_setopt($ch, CURLOPT_POST, true);
        @curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
        @curl_setopt($ch, CURLOPT_URL, $endpoint);
        @curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = @curl_exec($ch);
        $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_errors = curl_error($ch);
        @curl_close($ch);
        //print_r($datos['pokemones']);
        return redirect('/');
    }
}
