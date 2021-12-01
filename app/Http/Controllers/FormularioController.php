<?php

namespace App\Http\Controllers;

use App\Models\DocumentoDatosUsuario;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Models\HojaDocumento as HojaDocumento;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Storage;

class FormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = HojaDocumento::findOrfail(1)->first();
        return view('formulario',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = HojaDocumento::findOrfail($id)->first();
        return view('formulario',compact('data'));
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
    public function update(Request $request, $id)
    {
        $documento = HojaDocumento::findOrFail($id);
        $documento->update([
            'titulo' => $request->input('titulo'),
            'cuerpo' => $request->input('editor'),
            'codigo' => $request->input('codigo')
        ]);
        $data = HojaDocumento::findOrFail($id);
        $usuario = $request;
        $firma = '';
        if($request->firma !== null){
            $firma = $request->firma->getClientOriginalName();
            $request->firma->storeAs('public/', $request->firma->getClientOriginalName());
        }

        return PDF::loadView('pdf', compact('data','usuario'))
            ->stream('Cargo de recepción para '.$request->input("nombre_apellido").'.pdf');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = DocumentoDatosUsuario::findOrFail($id);
        Storage::delete('public/'.$user->firma);
        $user->delete();
        $data = DocumentoDatosUsuario::all();
        return view('registros',compact('data'));
    }

    public function formulario_pdf_publico($id){
        $data = HojaDocumento::findOrFail($id);
        return view('generar_pdf_publico',compact('data'));
    }

    public function generar_pdf_publico(Request $request,$id){
        $data = HojaDocumento::findOrFail($id);
        $usuario = $request;
        $firma = '';
        if($request->firma !== null){
            $firma = $request->firma->getClientOriginalName();
            $request->firma->storeAs('public/', $request->firma->getClientOriginalName());
        }

        if($usuario->input('fecha_recepcion')){
            $fecha_input = strtotime($usuario->input('fecha_recepcion'));
            $fecha= date('Y-m-d',$fecha_input);
        }
        DocumentoDatosUsuario::create(
            [
                'nombre_apellidos'=>$usuario->input('nombre_apellido'),
                'dni'=>$usuario->input('dni'),
                'codigo_colaborador'=>$usuario->input('codigo_colaborador'),
                'puesto_colaborador'=>$usuario->input('puesto_colaborador'),
                'area_colaborador'=>$usuario->input('area_colaborador'),
                'fecha_recepcion'=>$fecha,
                'firma'=>$firma
            ]
        );

        return PDF::loadView('pdf_publico', compact('data','usuario'))
            ->stream('Cargo de recepción para '.$request->input("nombre_apellido").'.pdf');
    }

    public function ver_registros(){
        $data = DocumentoDatosUsuario::all();
        return view('registros',compact('data'));
    }

    public function generar_pdf_admin($documento,$user){
        $user = DocumentoDatosUsuario::findOrfail($user);
        $documento = HojaDocumento::findorFail($documento);

        return PDF::loadView('pdf_admin', compact('documento','user'))
            ->stream('Cargo de recepción para '.$user->nombre_apellidos.'.pdf');

    }

}
