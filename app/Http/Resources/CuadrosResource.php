<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CuadrosResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [ 
            '' =>"---*---DATOS PROCESADOS---*---:''",
            'ID'                    =>$this->id,
            'Título'                =>Str::upper($this->titulo), 
            'Autor'                 =>Str::upper($this->autor),  
            'Description'           =>$this->description, 
            'Año de Creacion'       =>$this->anio_creacion, 
            'Código del Museo'      =>$this->cod_museo, 
            'Código de Registro'    =>$this->cod_registro, 
            'Precio'                =>$this->costo, 
            'Status'                =>$this->status, 
            'Fecha de Ingreso'      =>$this->created_at->format('d-m-Y'),
            'Fecha de Actualización'=>$this->updated_at->format('d-m-Y')

        ];
    }
    public function with($request)
    {
        return [ 
            'Respuesta'=>true            
        ];
    }
}
