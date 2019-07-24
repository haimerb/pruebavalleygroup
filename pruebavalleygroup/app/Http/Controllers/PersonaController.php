<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Persona;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persona = Persona::all();
        return response()->json($persona,200);
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
            'nombre_completo' => 'required|max:255',
            'edad' => 'required|numeric|max:200',
            'profesion_id' => 'required|numeric',
            'barrio_id'=>'required|numeric',
            ]);
        
            if($validator->fails()){
                return response()->json([
                    "error" => 'validation_error',
                    "message" => $validator->errors(),
                ], 422);
            }
        
            try{
                $persona=Persona::create($request->all());
                return response()->json(['status','registered successfully'],200);
            }
            catch(Exception $e){
                return response()->json([
                    "error" => "could_not_register",
                    "message" => "Unable to register user"
                ], 400);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        return response()->json([
            'data' => [
                'nombre_completo' => $persona->nombre_completo,
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        $auxPersona=$persona;
        $validator =  Validator::make($request->all(),[
            'nombre_completo' => 'required|max:255',
            'edad' => 'required|numeric|max:200',
            'profesion_id' => 'required|numeric',
            'barrio_id'=>'required|numeric',
            ]);
        
            if($validator->fails()){
                return response()->json([
                    "error" => 'error_validación',
                    "message" => $validator->errors(),
                ], 422);
            }
            
            try{
                $persona=$persona->update($request->all());
                
                return response()->json([
                    'status'=>['Persona Actualizada'],
                    'data' => [
                        'nombre_barrio' => $auxPersona->nombre_completo,
                    ],
                ],200);
            }
            catch(Exception $e){
                return response()->json([
                    "error" => "no_actualizó_persona",
                    "message" => "No es posible actualizar la Persona"
                ], 400);
            }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);
        $auxPersona=$persona;
    
        try{
            $persona->delete();
            
            return response()->json([
                'status'=>['Persona Eliminada'],
                'data' => [
                    'nombre_completo' => $auxPersona->nombre_completo,
                ],
            ],200);
        }
        catch(Exception $e){
            return response()->json([
                "error" => "no_elimino_persona",
                "message" => "No es posible eliminar la Persona"
            ], 400);
        } 
    }
}
