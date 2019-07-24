<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Barrio;
use App\Http\Resources\BarriosResource;

class BarrioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barrio = Barrio::all();
        return response()->json([
            'barrios' => [
                $barrio,
            ],
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(),[
            'nombre_barrio' => 'required|max:255',
            ]);
        
            if($validator->fails()){
                return response()->json([
                    "error" => 'validation_error',
                    "message" => $validator->errors(),
                ], 422);
            }
        
            try{
                $barrio=Barrio::create($request->all());
                
                return response()->json([
                    'status'=>['Barrio Creado'],
                    'data' => [
                        'nombre_barrio' => $barrio->nombre_barrio,
                    ],
                ],200);
            }
            catch(Exception $e){
                return response()->json([
                    "error" => "could_not_register",
                    "message" => "Unable to register Barrio"
                ], 400);
            }
    }

    /**
     * Muestra un Barrio especifico
     *
     * @param  Barrio  $barrio
     * @return \Illuminate\Http\Response
     */
    public function show(Barrio $barrio)
    {
        return response()->json([
            'data' => [
                'nombre_barrio' => $barrio->nombre_barrio,
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Actualiza un Barrio especifico.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barrio $barrio)
    {   
        $auxBarrio=$barrio;
        $validator =  Validator::make($request->all(),[
            'nombre_barrio' => 'required|max:255',
            ]);
        
            if($validator->fails()){
                return response()->json([
                    "error" => 'error_validación',
                    "message" => $validator->errors(),
                ], 422);
            }
            
            try{
                //Barrio::whereId($barrio->$id)->update($validatedData);
                $barrio=$barrio->update($request->all());
                
                return response()->json([
                    'status'=>['Barrio Actualizado'],
                    'data' => [
                        'nombre_barrio' => $auxBarrio->nombre_barrio,
                    ],
                ],200);
            }
            catch(Exception $e){
                return response()->json([
                    "error" => "no_actualizó_barrio",
                    "message" => "No es posible actualizar el Barrio"
                ], 400);
            }        
}


    /**
     * Elimina un Barrio especifico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $barrio = Barrio::findOrFail($id);
        $auxBarrio=$barrio;
    
        try{
            $barrio->delete();
            
            return response()->json([
                'status'=>['Barrio Eliminado'],
                'data' => [
                    'nombre_barrio' => $auxBarrio->nombre_barrio,
                ],
            ],200);
        }
        catch(Exception $e){
            return response()->json([
                "error" => "no_elimino_barrio",
                "message" => "No es posible eliminar el Barrio"
            ], 400);
        }        
    }
}
