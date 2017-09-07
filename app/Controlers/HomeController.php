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

}

















