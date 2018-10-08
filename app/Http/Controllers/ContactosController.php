<?php

namespace App\Http\Controllers;

use App\contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ContactosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos = DB::table('contactos')->where('id_user', '=', Auth::user()->id)->get();
        return view('contactos',compact('contactos'));;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contacto = new contacto();
        $contacto->nombre = $request->input('nombre');
        $contacto->apellido = $request->input('apellido');
        $contacto->telefono = $request->input('telefono');
        $contacto->celular = $request->input('celular');
        $contacto->mail = $request->input('mail');
        $contacto->id_user = Auth::user()->id;
        if(!$contacto->save()){
            App::abort(500, 'Error');
        }else{
            return redirect('contactos')->with('success', 'Contacto Registrado!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto = contacto::find($id);
        return view('edit',compact('contacto'));
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
        $contacto = contacto::find($id);
        $contacto->fill($request->all());
        if(!$contacto->save()){
            App::abort(500, 'Error');
        }else{
            return redirect('contactos')->with('success', 'Contacto Actualizado!');
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
        $contacto = contacto::find($id);
        if(!$contacto->delete()){
            App::abort(500, 'Error');
        }else{
            return redirect('contactos')->with('success', 'Contacto Eliminado!');
        }
    }
}
