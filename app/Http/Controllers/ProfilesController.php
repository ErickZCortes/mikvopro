<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('mikvo.dashboard.modules.profiles', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profiles = Profile::all();
        return view('mikvo.dashboard.modules.profiles', compact('profiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile = new Profile; 
 
        // Recibo todos los datos del formulario de la vista 'crear.blade.php'
        $profile->iduser_profile = $request->input('iduser_profile');
        $profile->name_profile = $request->input('name_profile');
        $profile->addpool_profile = $request->input('addpool_profile');
        $profile->vsubida_profile = $request->input('vsubida_profile');
        $profile->sbyte_profile = $request->input('sbyte_profile');
        $profile->vdescarga_profile = $request->input('vdescarga_profile');
        $profile->dbyte_profile = $request->input('dbyte_profile');
        $profile->cost_profile = $request->input('cost_profile');
        $profile->typet_profile = $request->input('typet_profile');
        $profile->limitda_profiles = $request->input('limitda_profiles');
        $profile->limitho_profiles = $request->input('limitho_profiles');
        $profile->expireda_profiles = $request->input('expireda_profiles');
        $profile->expiredho_profiles = $request->input('expiredho_profiles');
        $profile->cuttime_profile = $request->input('cuttime_profile');
       
        // Inserto todos los datos en mi tabla 'jugos' 
        $profile->save();
        
        // Hago una redirección a la vista principal con un mensaje 
        return redirect('mikvo/dashboard/modules/routerboard')->with('message','Guardado Satisfactoriamente !');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}