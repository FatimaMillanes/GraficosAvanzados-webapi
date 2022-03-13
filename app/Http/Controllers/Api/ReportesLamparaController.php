<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ReporteLampara;

class ReportesLamparaController extends Controller
{
    //
    public function store(Request $request){
        $respuesta = array();
        $respuesta['exito'] = false;
        $nuevoReporteLampara = new ReporteLampara();
        $nuevoReporteLampara->nombre_reportante = 
            $request->input('nombre_reportante');
        $nuevoReporteLampara->latitud = 
            $request->input('latitud');
        $nuevoReporteLampara->longitud = 
            $request->input('longitud');
        $nuevoReporteLampara->foto = 
            $request->input('foto');
        $nuevoReporteLampara->fecha_inicio_desperfecto = 
            $request->input('fecha_inicio_desperfecto');
        $nuevoReporteLampara->descripcion = 
            $request->input('descripcion');

        try{
            if($nuevoReporteLampara->save()){
                $respuesta['exito'] = true;
            }
        } catch(\Exception $e){
            $respuesta['mensaje'] = $e->getMessage();
            return response()->json($respuesta,500);
        }
        return $respuesta;
    }
}
