<?php

namespace App\Http\Controllers;

use App\Models\Cuadros;
use App\Http\Requests\StoreCuadrosRequest;
use App\Http\Requests\UpdateCuadrosRequest;
use App\Http\Resources\CuadrosResource;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Carbon\Carbon;


class CuadrosController extends Controller
{
    
    public function index()
    {
        
       return CuadrosResource::collection(Cuadros::all())
                    ->additional(['Mensaje' => 'Listado de cuadros en el museo'])
                    ->response()
                    ->setStatusCode(202);

    }
  
    public function store(StoreCuadrosRequest $request)
    {
       
        return (new CuadrosResource(Cuadros::create($request->all())))
                    ->additional(['Mensaje' => 'El cuadro fue agregado correctamenta'])
                    ->response()
                    ->setStatusCode(202);
    }

    public function show($id)
    {
        
        return  (new CuadrosResource(Cuadros::findOrFail($id)))
                    ->additional(['Mensaje' => 'Se efectuó la consulta específica de forma correcta', 'OTRO VALOR' =>'EL OTRO VALOR'])
                    ->response()
                    ->setStatusCode(202);
            
    }

    public function update(UpdateCuadrosRequest $request, $id)
    {
         $tiempoInicial= $this->getTime();
            $cuadros = Cuadros::find($id);
            $cuadros->update($request->all());
         $tiempoFinal= $this->getTime();
         $tiempoTotal = $tiempoFinal - $tiempoInicial;
        
         $cuadros->tiempo_respuesta = $tiempoTotal;
         $cuadros->accion = "UPDATE";
         $cuadros->save();

         return  (new CuadrosResource($cuadros))
                    ->additional(['Mensaje' => 'Se modificaron los datos del cuadro de forma correcta'])
                    ->response()
                    ->setStatusCode(202);

    }

    public function destroy($id)
    {
        $cuadros = Cuadros::find($id);
        $cuadros->delete();

        return  (new CuadrosResource($cuadros))
                ->additional(['Mensaje' => 'Se eliminaron los datos del cuadro de forma correcta'])
                ->response()
                ->setStatusCode(202);
    }

    public function consultaPorCriterios(Request $request)
    {
        $filters  = $request->input("filters");
        $fields  = $request->input("fields");
        $dataMatch = [];
        $data_proceso = [];
        [$keys_etis, $values] = Arr::divide($filters);

        
        foreach ($values as $value) {
            $filter_exp = explode(',',$value);
            if (isset($filter_exp[0])){ $filter_exp0=$filter_exp[0];} else { $filter_exp0="";}
            if (isset($filter_exp[1])){ $filter_exp1=$filter_exp[1];} else { $filter_exp1="";}
            if (isset($filter_exp[2])){ $filter_exp2=$filter_exp[2];} else { $filter_exp2="";}
            if (isset($filter_exp[3])){ $filter_exp3=$filter_exp[3];} else { $filter_exp3="";}
            if (isset($filter_exp[4])){ $filter_exp4=$filter_exp[4];} else { $filter_exp4="";}
            if (isset($filter_exp[5])){ $filter_exp5=$filter_exp[5];} else { $filter_exp5="";}
            if (isset($filter_exp[6])){ $filter_exp6=$filter_exp[6];} else { $filter_exp6="";}
            if (isset($filter_exp[7])){ $filter_exp7=$filter_exp[7];} else { $filter_exp7="";}
        }

        foreach ($keys_etis as $keys_eti) {
            $filter_expEti = explode(',',$keys_eti);
            if (isset($filter_expEti[0])){ $filter_expEti0=$filter_expEti[0];} else { $filter_expEti0="";}
            if (isset($filter_expEti[1])){ $filter_expEti1=$filter_expEti[1];} else { $filter_expEti1="";}
            if (isset($filter_expEti[2])){ $filter_expEti2=$filter_expEti[2];} else { $filter_expEti2="";}
            if (isset($filter_expEti[3])){ $filter_expEti3=$filter_expEti[3];} else { $filter_expEti3="";}
            if (isset($filter_expEti[4])){ $filter_expEti4=$filter_expEti[4];} else { $filter_expEti4="";}
            if (isset($filter_expEti[5])){ $filter_expEti5=$filter_expEti[5];} else { $filter_expEti5="";}
            if (isset($filter_expEti[6])){ $filter_expEti6=$filter_expEti[6];} else { $filter_expEti6="";}
            if (isset($filter_expEti[7])){ $filter_expEti7=$filter_expEti[7];} else { $filter_expEti7="";}
        }

              
           

            if ($filter_expEti0 != "" && $filter_exp0 != "") {$dataMatch += [$filter_expEti0=>$filter_exp0];}
            if ($filter_expEti1 != "" && $filter_exp1 != "") {$dataMatch += [$filter_expEti1=>$filter_exp1];}
            if ($filter_expEti2 != "" && $filter_exp2 != "") {$dataMatch += [$filter_expEti2=>$filter_exp2];}
            if ($filter_expEti3 != "" && $filter_exp3 != "") {$dataMatch += [$filter_expEti3=>$filter_exp3];}
            if ($filter_expEti4 != "" && $filter_exp4 != "") {$dataMatch += [$filter_expEti4=>$filter_exp4];}
            if ($filter_expEti5 != "" && $filter_exp5 != "") {$dataMatch += [$filter_expEti5=>$filter_exp5];}
            if ($filter_expEti6 != "" && $filter_exp6 != "") {$dataMatch += [$filter_expEti6=>$filter_exp6];}
            if ($filter_expEti7 != "" && $filter_exp7 != "") {$dataMatch += [$filter_expEti7=>$filter_exp7];}

            
            $cuadros_criterios = Cuadros::where($dataMatch)->first();


            $fieldsExp = explode(',',$fields);
            if (isset($fieldsExp[0])){ $fieldsExp0=$fieldsExp[0];} else { $fieldsExp0="";}
            if (isset($fieldsExp[1])){ $fieldsExp1=$fieldsExp[1];} else { $fieldsExp1="";}
            if (isset($fieldsExp[2])){ $fieldsExp2=$fieldsExp[2];} else { $fieldsExp2="";}
            if (isset($fieldsExp[3])){ $fieldsExp3=$fieldsExp[3];} else { $fieldsExp3="";}
            if (isset($fieldsExp[4])){ $fieldsExp4=$fieldsExp[4];} else { $fieldsExp4="";}
            if (isset($fieldsExp[5])){ $fieldsExp5=$fieldsExp[5];} else { $fieldsExp5="";}
            if (isset($fieldsExp[6])){ $fieldsExp6=$fieldsExp[6];} else { $fieldsExp6="";}
            if (isset($fieldsExp[7])){ $fieldsExp7=$fieldsExp[7];} else { $fieldsExp7="";}

            
            if($cuadros_criterios)
            {
                $data_proceso = array(
                    'Resultado' => true,
                    'Mensaje' => 'Consulta por criterios realizada con éxito',
               );
               
               if($fields == ""  &&  $fields == null )
               { 
                $data_proceso += array(
                    '' =>"---*---DATOS PROCESADOS---*---:''",
                    'Título'          => $cuadros_criterios->titulo,
                    'Autor'           => $cuadros_criterios->autor,
                    'Descripción'     => $cuadros_criterios->description,
                    'Costo'           => $cuadros_criterios->costo,
                    'Año de Creación' => $cuadros_criterios->anio_creacion,
                    'Estatus'         => $cuadros_criterios->status,
               );
               }
                else 
               {
                    if (!empty($fieldsExp[0])) {
                        if ($fieldsExp[0]=='titulo')  {$data_proceso += [$fieldsExp[0] =>$cuadros_criterios->titulo];
                         } elseif($fieldsExp[0]=='autor')  {$data_proceso += [$fieldsExp[0] =>$cuadros_criterios->autor];
                         } elseif($fieldsExp[0]=='description') {$data_proceso += [$fieldsExp[0] =>$cuadros_criterios->description];
                         } elseif($fieldsExp[0]=='costo')  {$data_proceso += [$fieldsExp[0] =>$cuadros_criterios->costo];
                         } elseif($fieldsExp[0]=='anio_creacion') {$data_proceso += [$fieldsExp[0] =>$cuadros_criterios->anio_creacion];
                         } elseif($fieldsExp[0]=='status') {$data_proceso += [$fieldsExp[0] =>$cuadros_criterios->status];
                         } elseif($fieldsExp[0]=='cod_museo') {$data_proceso += [$fieldsExp[0] =>$cuadros_criterios->cod_museo];
                         } elseif($fieldsExp[0]=='cod_registro') {$data_proceso += [$fieldsExp[0] =>$cuadros_criterios->cod_registro];
                         } else {  }
                    }
                    if (!empty($fieldsExp[1])) {
                        if ($fieldsExp[1]=='titulo')  {$data_proceso += [$fieldsExp[1] =>$cuadros_criterios->titulo];
                         } elseif($fieldsExp[1]=='autor')  {$data_proceso += [$fieldsExp[1] =>$cuadros_criterios->autor];
                         } elseif($fieldsExp[1]=='description') {$data_proceso += [$fieldsExp[1] =>$cuadros_criterios->description];
                         } elseif($fieldsExp[1]=='costo')  {$data_proceso += [$fieldsExp[1] =>$cuadros_criterios->costo];
                         } elseif($fieldsExp[1]=='anio_creacion') {$data_proceso += [$fieldsExp[1] =>$cuadros_criterios->anio_creacion];
                         } elseif($fieldsExp[1]=='status') {$data_proceso += [$fieldsExp[1] =>$cuadros_criterios->status];
                         } elseif($fieldsExp[1]=='cod_museo') {$data_proceso += [$fieldsExp[1] =>$cuadros_criterios->cod_museo];
                         } elseif($fieldsExp[1]=='cod_registro') {$data_proceso += [$fieldsExp[1] =>$cuadros_criterios->cod_registro];
                         } else {  }
                    }
                    if (!empty($fieldsExp[2])) {
                        if ($fieldsExp[2]=='titulo')  {$data_proceso += [$fieldsExp[2] =>$cuadros_criterios->titulo];
                        } elseif($fieldsExp[2]=='autor')  {$data_proceso += [$fieldsExp[2] =>$cuadros_criterios->autor];
                        } elseif($fieldsExp[2]=='description') {$data_proceso += [$fieldsExp[2] =>$cuadros_criterios->description];
                        } elseif($fieldsExp[2]=='costo')  {$data_proceso += [$fieldsExp[2] =>$cuadros_criterios->costo];
                        } elseif($fieldsExp[2]=='anio_creacion') {$data_proceso += [$fieldsExp[2] =>$cuadros_criterios->anio_creacion];
                        } elseif($fieldsExp[2]=='status') {$data_proceso += [$fieldsExp[2] =>$cuadros_criterios->status];
                        } elseif($fieldsExp[2]=='cod_museo') {$data_proceso += [$fieldsExp[2] =>$cuadros_criterios->cod_museo];
                        } elseif($fieldsExp[2]=='cod_registro') {$data_proceso += [$fieldsExp[2] =>$cuadros_criterios->cod_registro];
                        } else {  }
               
                    }
                    if (!empty($fieldsExp[3])) {
                        if ($fieldsExp[3]=='titulo')  {$data_proceso += [$fieldsExp[3] =>$cuadros_criterios->titulo];
                         } elseif($fieldsExp[3]=='autor')  {$data_proceso += [$fieldsExp[3] =>$cuadros_criterios->autor];
                         } elseif($fieldsExp[3]=='description') {$data_proceso += [$fieldsExp[3] =>$cuadros_criterios->description];
                         } elseif($fieldsExp[3]=='costo')  {$data_proceso += [$fieldsExp[3] =>$cuadros_criterios->costo];
                         } elseif($fieldsExp[3]=='anio_creacion') {$data_proceso += [$fieldsExp[3] =>$cuadros_criterios->anio_creacion];
                         } elseif($fieldsExp[3]=='status') {$data_proceso += [$fieldsExp[3] =>$cuadros_criterios->status];
                         } elseif($fieldsExp[3]=='cod_museo') {$data_proceso += [$fieldsExp[3] =>$cuadros_criterios->cod_museo];
                         } elseif($fieldsExp[3]=='cod_registro') {$data_proceso += [$fieldsExp[3] =>$cuadros_criterios->cod_registro];
                         } else {  }
                    }
                    if (!empty($fieldsExp[4])) {
                        if ($fieldsExp[4]=='titulo')  {$data_proceso += [$fieldsExp[4] =>$cuadros_criterios->titulo];
                         } elseif($fieldsExp[4]=='autor')  {$data_proceso += [$fieldsExp[4] =>$cuadros_criterios->autor];
                         } elseif($fieldsExp[4]=='description') {$data_proceso += [$fieldsExp[4] =>$cuadros_criterios->description];
                         } elseif($fieldsExp[4]=='costo')  {$data_proceso += [$fieldsExp[4] =>$cuadros_criterios->costo];
                         } elseif($fieldsExp[4]=='anio_creacion') {$data_proceso += [$fieldsExp[4] =>$cuadros_criterios->anio_creacion];
                         } elseif($fieldsExp[4]=='status') {$data_proceso += [$fieldsExp[4] =>$cuadros_criterios->status];
                         } elseif($fieldsExp[4]=='cod_museo') {$data_proceso += [$fieldsExp[4] =>$cuadros_criterios->cod_museo];
                         } elseif($fieldsExp[4]=='cod_registro') {$data_proceso += [$fieldsExp[4] =>$cuadros_criterios->cod_registro];
                         } else {  }
                    }
                    if (!empty($fieldsExp[5])) {
                        if ($fieldsExp[5]=='titulo')  {$data_proceso += [$fieldsExp[5] =>$cuadros_criterios->titulo];
                         } elseif($fieldsExp[5]=='autor')  {$data_proceso += [$fieldsExp[5] =>$cuadros_criterios->autor];
                         } elseif($fieldsExp[5]=='description') {$data_proceso += [$fieldsExp[5] =>$cuadros_criterios->description];
                         } elseif($fieldsExp[5]=='costo')  {$data_proceso += [$fieldsExp[5] =>$cuadros_criterios->costo];
                         } elseif($fieldsExp[5]=='anio_creacion') {$data_proceso += [$fieldsExp[5] =>$cuadros_criterios->anio_creacion];
                         } elseif($fieldsExp[5]=='status') {$data_proceso += [$fieldsExp[5] =>$cuadros_criterios->status];
                         } elseif($fieldsExp[5]=='cod_museo') {$data_proceso += [$fieldsExp[5] =>$cuadros_criterios->cod_museo];
                         } elseif($fieldsExp[5]=='cod_registro') {$data_proceso += [$fieldsExp[5] =>$cuadros_criterios->cod_registro];
                         } else {  }
                    }
                    if (!empty($fieldsExp[6])) {
                        if ($fieldsExp[6]=='titulo')  {$data_proceso += [$fieldsExp[6] =>$cuadros_criterios->titulo];
                         } elseif($fieldsExp[6]=='autor')  {$data_proceso += [$fieldsExp[6] =>$cuadros_criterios->autor];
                         } elseif($fieldsExp[6]=='description') {$data_proceso += [$fieldsExp[6] =>$cuadros_criterios->description];
                         } elseif($fieldsExp[6]=='costo')  {$data_proceso += [$fieldsExp[6] =>$cuadros_criterios->costo];
                         } elseif($fieldsExp[6]=='anio_creacion') {$data_proceso += [$fieldsExp[6] =>$cuadros_criterios->anio_creacion];
                         } elseif($fieldsExp[6]=='status') {$data_proceso += [$fieldsExp[6] =>$cuadros_criterios->status];
                         } elseif($fieldsExp[6]=='cod_museo') {$data_proceso += [$fieldsExp[6] =>$cuadros_criterios->cod_museo];
                         } elseif($fieldsExp[6]=='cod_registro') {$data_proceso += [$fieldsExp[6] =>$cuadros_criterios->cod_registro];
                         } else {  }
                    }
                    if (!empty($fieldsExp[7])) {
                        if ($fieldsExp[7]=='titulo')  {$data_proceso += [$fieldsExp[7] =>$cuadros_criterios->titulo];
                         } elseif($fieldsExp[7]=='autor')  {$data_proceso += [$fieldsExp[7] =>$cuadros_criterios->autor];
                         } elseif($fieldsExp[7]=='description') {$data_proceso += [$fieldsExp[7] =>$cuadros_criterios->description];
                         } elseif($fieldsExp[7]=='costo')  {$data_proceso += [$fieldsExp[7] =>$cuadros_criterios->costo];
                         } elseif($fieldsExp[7]=='anio_creacion') {$data_proceso += [$fieldsExp[7] =>$cuadros_criterios->anio_creacion];
                         } elseif($fieldsExp[7]=='status') {$data_proceso += [$fieldsExp[7] =>$cuadros_criterios->status];
                         } elseif($fieldsExp[7]=='cod_museo') {$data_proceso += [$fieldsExp[7] =>$cuadros_criterios->cod_museo];
                         } elseif($fieldsExp[7]=='cod_registro') {$data_proceso += [$fieldsExp[7] =>$cuadros_criterios->cod_registro];
                         } else {  }
                    }

               }

                return response()->json($data_proceso);
               
            } else 
            { 
                $data_proceso = array(
                    'Resultado' => false,
                    'Mensaje' => 'Consulta por criterios no encontro datos de cuadros',
               );
               return response()->json($data_proceso); 
            } 
                   
    }
    public function getTime()
    {
        list($usec, $sec) = explode(" ", microtime());
        return (float) $usec + (float) $sec;
    }

    public function calcularPromedioTiempo()
    {
       
       $tiempos = Cuadros::where('tiempo_respuesta', '<>', "")->get();

       $total = 0;
       $data_proceso = [];
       $data = [];

        if ($tiempos->count()) {
            foreach ($tiempos as $tiempo) { 
                $tiempoSum = $tiempo->tiempo_respuesta;
                $total+=$tiempoSum;

                $data[] = ['Título' => $tiempo->titulo,'Autor' => $tiempo->autor,'Accion' => $tiempo->accion, 'Tiempo de ejecución de la acción' => $tiempo->tiempo_respuesta];
               
            }
          
            $toral_registros = $tiempos->count();
            $promedio = $total / $toral_registros;

            $data_proceso = array(
                'Resultado' => true,
                'Mensaje' => 'Resumen de promedio de tiempo de repuesta en el servicio de actualización',
                'Promedio de tiempo' => $promedio,
                'Total de registros' => $toral_registros,
                'Cuadros procesados' => $data,
           );
           return response()->json($data_proceso); 
            
        }

    }
}
