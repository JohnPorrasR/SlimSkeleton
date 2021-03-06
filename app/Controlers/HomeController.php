<?php

namespace App\Controllers;

use App\Models\Avistamiento;

class HomeController extends Controller
{
    public function index($request, $response)
    {
        return "Hola mundo desde el controller";
    }

    public function avistamientos($request, $response)
    {
        $avistamientos = Avistamiento::all();
        if($avistamientos)
        {
            $response = $response->withJson($avistamientos);
        }
        else{
            $response->write('{"error": {"texto":Error}}');
        }
        return $response;
    }

    public function avistamientosDetalles($request, $response)
    {
        $avistamientos = Avistamiento::find($request->getParam('cod'));
        if($avistamientos)
        {
            $response = $response->withJson($avistamientos);
        }
        else{
            $response->write('{"error": {"texto":Error}}');
        }
        return $response;
    }

    public function addAvistamiento($request, $response)
    {
        $titulo = $request->getParam('titulo');
        $pajaro = $request->getParam('pajaro');
        $lastview = $request->getParam('lastview');
        $veces = $request->getParam('veces');
        $latitud = $request->getParam('latitud');
        $longitud = $request->getParam('longitud');
        $inputs = ['titulo'=>$titulo,'pajaro'=>$pajaro,'lastview'=>$lastview,'veces'=>$veces,
            'latitud'=>$latitud,'longitud'=>$longitud];
        $avistamientos = Avistamiento::create($inputs);
        return "Ok";
    }

}

















