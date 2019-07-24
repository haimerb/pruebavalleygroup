<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BarriosResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type'          => 'barrios',
            'id'            => (string)$this->id,
            'attributes'    => [
                'nombre_barrio' => $this->nombre_barrio,
            ],
        ];
    }
}
